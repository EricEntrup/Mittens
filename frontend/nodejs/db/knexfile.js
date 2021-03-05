require('dotenv').config({
    path: `../.env`,
});
global.Promise = require('bluebird');
// knexfile.js
module.exports = {
    development: {
        client: 'mysql',
        connection: {
            host : process.env.DATABASE_HOST,
            database: process.env.DATABASE_NAME,
            user: process.env.DATABASE_USER,
            password: process.env.DATABASE_PASSWORD,
        },
        pool: {
            min: 2,
            max: 10,
        },
        migrations: {
            directory: './migrations',
            tableName: 'migrations',
        },
        seeds: {
            directory: './seeds',
        },
    },

    staging: {
        client: 'mysql',
        connection: {
            host : process.env.STG_DATABASE_HOST,
            database: process.env.STG_DATABASE_NAME,
            user: process.env.STG_DATABASE_USER,
            password: process.env.STG_DATABASE_PASSWORD,
        },
        pool: {
            min: 2,
            max: 10,
        },
        migrations: {
            directory: './migrations',
            tableName: 'migrations',
        },
        seeds: {
            directory: './seeds',
        },
    },

    production: {
        client: 'mysql',
        connection: {
            host : process.env.PROD_DATABASE_HOST,
            database: process.env.PROD_DATABASE_NAME,
            user: process.env.PROD_DATABASE_USER,
            password: process.env.PROD_DATABASE_PASSWORD,
        },
        pool: {
            min: 2,
            max: 10,
        },
        migrations: {
            directory: './migrations',
            tableName: 'migrations',
        },
        seeds: {
            directory: './seeds',
        },
    },

    test: {
        client: 'sqlite3',
        connection: {
            filename: "./mydb.sqlite"
        },
        pool: {
            min: 2,
            max: 10,
        },
    },
};
