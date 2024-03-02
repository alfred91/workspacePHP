FROM node:21-slim
WORKDIR /usr/src/app
COPY package*.json ./
RUN yarn install
COPY . .
EXPOSE 8080
CMD ["node", "src/app.js"]
