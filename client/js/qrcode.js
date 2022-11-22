
const generatePayload = require('promptpay-qr') 
const qrcode = require('qrcode') 

const price = document.querySelector('#price');



const mobileNumber = '087-639-1130' 
const amount = 0
const payload = generatePayload(mobileNumber, { price }) //First parameter : mobileNumber || IDCardNumber
console.log(payload)

// Convert to SVG QR Code
const options = { type: 'svg', color: { dark: '#000', light: '#fff' } }
qrcode.toString(payload, options, (err, svg) => {
    if (err) return console.log(err)
    console.log(svg)
    
})








