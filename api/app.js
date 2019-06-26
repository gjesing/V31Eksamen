const express = require('express')
const app = express()
const mysql = require('mysql')

app.get("/V31Eksamen/api/products", (req, res) => {
    console.log("Fetching all products")

    const connection = mysql.createConnection({
        host: 'localhost',
        user: 'root',
        database: 'V31Eksamen'
    })

    connection.query("SELECT * FROM Products", (err, rows, fields) => {
        console.log("I think we fetched products successfully")
        res.json(rows)
    })

}).get('/V31Eksamen/api/product/:id', (req, res) => {
    console.log("Fetching product with id: " + req.params.id)

    const connection = mysql.createConnection({
        host: 'localhost',
        user: 'root',
        database: 'V31Eksamen'
    })

    connection.query("SELECT * FROM Products WHERE productId = " + req.params.id, (err, rows, fields) => {
        console.log("I think we fetched products successfully")
        res.json(rows)
    })

}).listen(3000, () => {
    console.log("Server is up and listening on 3000...")
})