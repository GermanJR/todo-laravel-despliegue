<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'tonet_german_ud4_a4');

// Project repository
set('repository', 'https://github.com/GermanJR/todo-laravel-despliegue.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', [".env"]);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', ["bootstrap", "storage","database"]);


// Hosts

host('172.16.221.120') ->user('prod-ud4-deployer')
 ->identityFile('~/.ssh/id_rsa')
 ->set('deploy_path', '/var/www/prod-ud4-a4/html');    
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'artisan:migrate');

