#!/bin/bash
source .env

echo "Deploy loval development environment? (type local)"
read applicationContext

case "$applicationContext" in
	"local")
		echo "Local development set."
		
		;;
esac

echo "Initialize setup? (y/n)"
read initializeWebsite


dockerContainer=stock-workspace
dockerDatabaseContainer=stock-db

setFilePermissions() {
	echo "Set correct access rights (Currently doing nothing)"
}

initializeWebsite() {
    echo "Copy .env.example into .env and docker-compose.applicationContext.yml in docker-compose.yml? (y/n)"
    read copyenvcomp 
    if [ "$copyenvcomp" == "y" ]
        then
            copyenvcomposeFiles
    fi

    echo "Start docker? (y/n)"
    read startdocker
    if [ "$startdocker" == "y" ]
        then
            startDocker
    fi
	
	case "$applicationContext" in
		"local")
			echo "Setting .htaccess for local environment..."
			#docker cp htaccess/_htaccess.development.localhost $dockerContainer:$currentFolder/html/.htaccess && echo ".htaccess set successfully..."
			echo "Site config set successfully..."
			;;
	esac		
	
	echo "Run composer install and npm install? (y/n)"
	read composerinstall
	if [ "$composerinstall" == "y" ]
		then
			echo "Installing php dependencies (composer install)"
			docker exec $dockerContainer composer install
			echo "Installing all js dependencies throug npm (npm update)"
			docker exec $dockerContainer npm update
			echo "Building js and css bundles (npm run development)"
			docker exec $dockerContainer npm run development
			echo "Building db structure (php artisan migrate)"
			docker exec $dockerContainer php artisan migrate
	fi

	#echo "Prepare filestructure"
	#docker exec $dockerContainer mkdir $currentFolder/web/fileadmin/

    setFilePermissions

	if [ "$applicationContext" == "local" ]
		then
			echo "Insert dummy data on db? (y/n)"
			read insertdummydata
			if [ "$insertdummydata" == "y" ]
				then
					echo "Inserting dummy data on database for displaying as example (php artisan db:seed)"
					docker exec $dockerContainer php artisan db:seed --class=BrandSeeder
					docker exec $dockerContainer php artisan db:seed --class=PersonSeeder
					docker exec $dockerContainer php artisan db:seed --class=SupplierSeeder
					docker exec $dockerContainer php artisan db:seed
					echo "Everything seems alright, don't know what does it mean the next lines."
			fi
	fi
}

copyenvcomposeFiles() {
    if [ "$applicationContext" == "local" ]
		then
			echo "Running 'cp docker-compose.yml.local docker-compose.yml' and 'cp .env.example .env'..."
			cp docker-compose.yml.local docker-compose.yml
			cp .env.example .env
	fi
}

startDocker() {
	echo "Running docker-compose up -d..."
    docker-compose up -d
}

if [ "$initializeWebsite" == "y" ] 
	then
       initializeWebsite 
fi