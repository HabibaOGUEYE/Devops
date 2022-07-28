pipeline {
    agent any

    stages {
        stage('Recuperation du code sur github') {
            steps {
                git branch: 'delivery', credentialsId: 'git_credentials', url: 'https://github.com/HabibaOGUEYE/Devops'
            }
        }

        stage('Build Application Image') {
            steps {
                    echo 'Building the app image ....'
                    sh 'docker build -t devops_php-apache-environment .'
                }
        }

        stage('Build Database Image') {
            steps {
                    sh 'docker build -t 8593b6a707fc .'
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
        failure {
            slackSend message:"Build Failed - ${env.JOB_NAME} ${env.BUILD_NUMBER} (<${env.BUILD_URL}|Open>)"
        }
        success {
            slackSend message:"Build Successfull - ${env.JOB_NAME} ${env.BUILD_NUMBER} (<${env.BUILD_URL}|Open>)"
        }
    }
}