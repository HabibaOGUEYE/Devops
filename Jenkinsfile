pipeline {
    agent any

    stages {
        stage('Recuperation du code sur github') {
            String branchName = env.delivery
            String gitCredentials = "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"
            String repoUrl = "https://github.com/HabibaOGUEYE/Devops.git"
            steps {
            echo 'Make the output directory'
            sh 'mkdir -p build'

            echo 'Cloning files from (branch: "' + branchName + '" )'
            dir('build') {
                git branch: branchName, credentialsId: 	gitCredentials, url: repoUrl
            } 
            }
        }

        stage('Build Application Image') {
            steps {
                dir("Containers/simple-flask-app") {
                    sh 'docker build -t powercontainer .'
                }
            }
        }

        stage('Build Database Image') {
            steps {
                dir("Containers/simple-flask-app") {
                    sh 'docker build -t database .'
                }
            }
        }

        stage('Docker Compose') {
            steps {
                sh 'docker compose up -d --no-color --wait'
                sh 'docker compose ps'
            }
        }

        stage('Test of the application with curl') {
            steps {
                sh 'curl http://localhost:8010'
            }
        }

        stage ('Tag Image Docker') {
            steps {
                script {
                    sh "docker tag docker.build(powercontainer) docker.build(database)"
                }
            }
        }

        stage('Run Docker Container') {
            steps {
                sh 'docker run -d -p 8090:8080 --name 7bc3aa6f56fb powercontainer'
                sh 'sleep 15s'
            }
        }
        stage('Test Docker Container') {
            steps {
               sh 'curl http://localhost:8010'
            }
        }

        stage('Clean Environment') {
            steps {
                sh 'docker stop 7bc3aa6f56fb'
                sh 'docker rm 7bc3aa6f56fb'
            }
        }
    }
    post {
        success {
            slackSend message:"A new version of app is succesful build - ${env.JOB_NAME} ${env.BUILD_NUMBER} (<${env.BUILD_URL}|Open>)"
        }
    }
}