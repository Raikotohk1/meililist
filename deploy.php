<?php
namespace Deployer;

require 'recipe/laravel.php';

// Zone ühendus

set('application', 'meililist');
set('remote_user', 'virt118421');
set('http_user', 'virt118421');
set('keep_releases', 2);

host('ta22tohk.itmajakas.ee')
    ->setHostname('ta22tohk.itmajakas.ee')
    ->set('http_user', 'virt118421')
    ->set('deploy_path', '~/domeenid/www.ta22tohk.itmajakas.ee/meililist
    ')
    ->set('branch', 'main');

set('repository', 'git@github.com:Raikotohk1/meililist.git');

//tasks
task('opcache:clear', function () {
    run('killall php82-cgi || true');
})->desc('Clear opcache');

task('build:node', function (){
    cd('{{release_path}}');
    run('npm i');
    run('npx vite build');
    run('rm -rf node_modules');
});

task('deploy',[
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'build:node',
    'deploy:publish',
    'opcache:clear',
    'artisan:cache:clear'
]);

// Hosts

after('deploy:failed', 'deploy:unlock');