#!/bin/bash
source .env

echo "Deploy loval development environment? (type local)"
read applicationContext

case "$applicationContext" in
	"local")
		echo "Local development set."
		
		;;
esac

echo "initialize? (y/n)"
read initializeWebsite


dockerContainer=stock-workspace
dockerDatabaseContainer=stock-db

setFilePermissions() {

	# chown folder for cache

	echo "set correct access rights"
	#docker exec $dockerContainer chown www-data /var/www
}

initializeWebsite() {
    echo "cop env and compose? (y/n)"
    read copyenvcomp 
    if [ "$copyenvcomp" == "y" ]
        then
            copyenvcomposeFiles
    fi

    echo "start docker? (y/n)"
    read startdocker
    if [ "$startdocker" == "y" ]
        then
            startDocker
    fi
	
	case "$applicationContext" in
		"local")
			echo "setting .htaccess for local environment..."
			#docker cp htaccess/_htaccess.development.localhost $dockerContainer:$currentFolder/html/.htaccess && echo ".htaccess set successfully..."
			echo "site config set successfully..."
			;;
	esac		
	
	echo "Run composer install and npm install? (y/n)"
	read composerinstall
	if [ "$composerinstall" == "y" ]
		then
			docker exec $dockerContainer composer install
			docker exec $dockerContainer npm install
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
					echo "HERE EXEUTE PHP ARTISAN MIGRATE AND SO ON"
			fi
	fi
}

copyenvcomposeFiles() {
    if [ "$applicationContext" == "local" ]
		then
			cp docker-compose.yml.local docker-compose.yml
			cp _env.example .env
	fi
}

startDocker() {
    docker-compose up -d
}

if [ "$initializeWebsite" == "y" ] 
	then
       initializeWebsite 
fi