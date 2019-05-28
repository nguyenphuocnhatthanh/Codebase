<?php

namespace App\Console\Commands;

use Validator;
use App\Models\Admin;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a admin account';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = $this->data();
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            $this->error(json_encode($validator->getMessageBag()->getMessages()));
            return;
        }

        $admin = Admin::create($data);

        $this->info('Create a admin '. $admin->email .' successfully');
    }

    /**
     * Prepare data
     *
     * @void
     */
    private function data()
    {
        return [
            'name' => $this->ask('Please input Name'),
            'email' => $this->ask('Please input Email'),
            'password' => $this->secret('Please input password'),
            'password_confirmation' => $this->secret('Please input password confirm'),
        ];
    }

    /**
     * Set rules
     *
     * @return array
     */
    private function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email|max:255',
            'password' => 'required|min:6|max:255|confirmed',
        ];
    }
}
