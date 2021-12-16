FROM node:latest
LABEL AUTHOR="Samuel Santos Henrique"
ENV NODE_ENV=production
ENV PORT=3000
WORKDIR /var/www
COPY . /var/www
RUN npm install
ENTRYPOINT [ "npm", "start" ]
EXPOSE $PORT