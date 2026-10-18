pipeline {
    agent any
    environment {
        DOCKERHUB_USER       = 'lovielova'
        REGISTRY_CREDENTIALS = 'dockerhub-credentials'
    }
    stages {
        stage('Checkout') {
            steps { checkout scm }
        }
        stage('Build') {
            steps {
                bat 'echo Mulai build klinik-kecantikan'
                bat 'docker --version'
            }
        }
        stage('Build Docker Image') {
            steps {
                script {
                    def services = ['user-service', 'booking-service', 'treatment-service', 'notification-service']
                    for (s in services) {
                        bat "docker build -t %DOCKERHUB_USER%/klinik-${s}:%BUILD_NUMBER% -t %DOCKERHUB_USER%/klinik-${s}:latest .\\${s}"
                    }
                }
            }
        }
        stage('Push Docker Image') {
            steps {
                withCredentials([usernamePassword(credentialsId: REGISTRY_CREDENTIALS, usernameVariable: 'DH_USER', passwordVariable: 'DH_PASS')]) {
                    bat 'echo %DH_PASS%| docker login -u %DH_USER% --password-stdin'
                    script {
                        def services = ['user-service', 'booking-service', 'treatment-service', 'notification-service']
                        for (s in services) {
                            bat "docker push %DOCKERHUB_USER%/klinik-${s}:%BUILD_NUMBER%"
                            bat "docker push %DOCKERHUB_USER%/klinik-${s}:latest"
                        }
                    }
                }
            }
        }
    }
    post {
        always { echo 'Selesai build' }
    }
}
