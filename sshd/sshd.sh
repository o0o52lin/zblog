#!/bin/bash

dpkg -i /src/sshd/libwrap0_7.6.q-28_amd64.deb

dpkg -i /src/sshd/runit-helper_2.15.2_all.deb

dpkg -i /src/sshd/openssh-client_9.2p1-2_amd64.deb

dpkg -i /src/sshd/openssh-sftp-server_9.2p1-2_amd64.deb

dpkg -i /src/sshd/openssh-server_9.2p1-2_amd64.deb

password='9028456'

echo "root:$password" | chpasswd

mkdir -p /var/run/sshd

echo "PermitRootLogin yes" >> /etc/ssh/sshd_config

echo "PasswordAuthentication yes" >> /etc/ssh/sshd_config

echo "LD_LIBRARY_PATH=/usr/lib64-nvidia" >> /root/.bashrc

echo "export LD_LIBRARY_PATH" >> /root/.bashrc

nohup /usr/sbin/sshd -D &

tar xvzf ngrok-v3-stable-linux-amd64.tgz -C /usr/local/bin

ngrok config add-authtoken "2RkIiHPgfucdreF63Z5L8P1BR3V_5RpsFfVRQNyDBSgTyUBxr"

nohup ngrok tcp 22 &

json=$(curl -s http://localhost:4040/api/tunnels)

port=$(echo "$json" | grep -oP '(?<="public_url":"tcp://)[^:]+:\K[^"]+')

host=$(echo "$json" | grep -oP '(?<="public_url":"tcp://)[^:]+')

echo "SSH command:\nssh -p$port root@$host\n$password"