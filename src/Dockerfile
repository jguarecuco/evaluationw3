FROM ubuntu:18.04
RUN apt update -y
RUN apt install wget php-cli php-zip unzip -y
RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN export PATH="$HOME/.symfony/bin:$PATH"
RUN symfony --version