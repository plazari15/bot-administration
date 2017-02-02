<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:send {--now : mensagens que devem ser enviadas com urgencia} {--sponsor : itens patrocinados}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send message to our users';

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
        $client = new \GuzzleHttp\Client();

        if($this->option('now')){
            $res = $client->request('GET', 'https://trainer.pedrolazari.com/subscription.php?sendNow=1');

            return $this->info('Vai iniciar agora o disparo de mensagens com envio imediato!');
        }

        $res = $client->request('GET', 'https://trainer.pedrolazari.com/subscription.php?category=1');
        $res = $client->request('GET', 'https://trainer.pedrolazari.com/subscription.php?category=2');
        $res = $client->request('GET', 'https://trainer.pedrolazari.com/subscription.php?category=3');

        if($res->getStatusCode() == '200'){
           return $this->info('Mensagens enviadas com sucesso!');
        }
    }
}
