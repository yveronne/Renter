<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'Renter');

// Project repository
set('repository', 'https://github.com/yveronne/Renter.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('157.230.216.216')
    ->user('deployer')
    ->set('deploy_path', '/var/www/html/Renter');  
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

