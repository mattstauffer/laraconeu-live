@servers(['web' => 'beanstalk@heybigname.com'])

@task('deploy', ['on' => 'web'])
    cd /usr/share/nginx/live.laracon.eu
    git pull origin master
    composer install --no-dev
    php artisan migrate
@endtask
