<?php
//
//namespace App\Console\Commands;
//
//use Illuminate\Console\Command;
//use Illuminate\Support\Facades\File;
//
//class MakeChannelCommand extends Command
//{
//    protected $signature = 'make:channel {className}';
//
//    protected $description = 'Make a new channel class';
//
//    public function handle(): int
//    {
//        $this->create();
//
//        return static::SUCCESS;
//    }
//
//    protected function create(): void
//    {
//        $path = $this->getClassPath();
//
//        if (file_exists($path)) {
//            $this->info("File: {$path} already exits.");
//
//            return;
//        }
//
//        $this->makeDirectory(dirname($path));
//
//        $content = $this->getClassFile();
//
//        file_put_contents($path, $content);
//
//        $this->info("File: {$path} created successfully.");
//    }
//
//    protected function getClassName(): string
//    {
//        return ucwords($this->argument('className', ''));
//    }
//
//    protected function getClassPath(): string
//    {
//        return app_path('Http/Authentication/Channels/'.$this->getClassName()).'.php';
//    }
//
//    protected function getClassFile(): string
//    {
//        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
//    }
//
//    protected function getStubPath(): string
//    {
//        return __DIR__.'/../../resources/stubs/channel.stub';
//    }
//
//    protected function getStubVariables(): array
//    {
//        return [
//            'NAMESPACE' => 'App\\Http\\Authentication\\Channels',
//            'CLASS_NAME' => $this->getClassName(),
//        ];
//    }
//
//    public function getStubContents(string $path, $variables = []): string
//    {
//        $contents = file_get_contents($path);
//
//        foreach ($variables as $search => $replace) {
//            $contents = str_replace('$'.$search.'$', $replace, $contents);
//        }
//
//        return $contents;
//    }
//
//    protected function makeDirectory(string $path): void
//    {
//        if (is_dir($path)) {
//            return;
//        }
//
//        mkdir($path, 0777, true, true);
//    }
//}
