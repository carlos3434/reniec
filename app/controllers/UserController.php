<?php

class UserController extends Controller
{
    use CaptchaTrait;
    public function postAll(){
        return User::all();
    }
    public function postAllPaginate(){
        return Response::json(User::searchPaginateAndOrder());
    }
    /**
     * view register
     */
    public function getRegister() {
        return View::make('register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['captcha'] = $this->captchaCheck();
        $validator = Validator::make($data,User::$rules, User::$messajes);
        return $validator;
    }
    /**
     * create user
     */
    public function postCreate() {
        $validator = $this->validator(Input::all());

        if ( $validator->fails() ) {
            return Response::json(
                array(
                'rst'=>2,
                'msj'=>$validator->messages(),
                )
            );
        }
        $user = User::create(Input::all());
        //enviar email
        Mail::queue('emails.auth.confirm', compact('user') , function($m) use( $user ) {
            $m->to($user->getReminderEmail())
              //->cc($emailseguimiento)
              ->subject('Bienvenido!');
        });

        $cargoId = 13; //vecino
        $areaId=107;//area
/*
        $cargo = Cargo::find($cargoId);
        $cargoPersona=$user->cargos()->save($cargo, 
            [
                'estado' => 1,
                'usuario_created_at' => $user->id
                ]
            );

        DB::table('area_cargo_persona')->insert(
            [
                'area_id' => $areaId,
                'cargo_persona_id' => $cargoPersona->id,
                'estado' => 1,
                'usuario_created_at' => $user->id
            ]
        );*/
        return  ['rst'=>1,'msj'=>'Se envio un mensaje de confirmacion a su cuenta de email'];
        return  LoginController::postSignin();

    }
    /**
     * Confirm a user's email address.
     *
     * @param  string $token
     * @return mixed
     */
    public function confirmEmail($token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();
        return Redirect::to('/');
    }
    /**
     * Attempt to sign in the user.
     *
     * @param  Request $request
     * @return boolean
     */
    protected function signIn()
    {
        return Auth::attempt($this->getCredentials(), Input::get('remember') );
    }

    public function postLogin()
    {
        $validator = $this->getLoginValidator();
        if ($validator->passes()) {
            $credentials = $this->getCredentials();

            if ($this->signIn()) {
                return Redirect::to('inicio');
            }

            return Redirect::back()->withErrors(
                [
                 'password' => ['Credentials invalid.'],
                ]
            );
        } else {
            return Redirect::back()->withInput()->withErrors($validator);
        }

    }

    protected function getLoginValidator()
    {
        return Validator::make(
            Input::all(),
            [
             'username' => 'required',
             'password' => 'required',
            ]
        );

    }
    /**
     * Get the login credentials and requirements.
     *
     * @param  Request $request
     * @return array
     */
    protected function getCredentials( )
    {
        return [
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'verified' => true
        ];
    }




    public function getProfile()
    {
        return View::make('user/profile');

    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');

    }

    public function postListar()
    {
        if ( Request::ajax() ) {
            $listar = DB::table('users')
                    ->select('id','nombres as nombre')
                    ->where('verified',1)
                    ->get();

            return Response::json(
                array(
                    'rst'   => 1,
                    'datos' => $listar
                )
            );
        }
    }

}