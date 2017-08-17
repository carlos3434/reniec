<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call("UserSeeder");
		$this->call('EntrustSeeder');
		$this->call('MesaSeeder');
		$this->call('PlatoSeeder');
		$this->call('PedidoSeeder');
		$this->call('CalendarioSeeder');
		$this->call('TareaSeeder');
		$this->call('TrabajadorSeeder');
	}

}
