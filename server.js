const express = require('express');
const app = express();
app.use(express.static(__dirname + '/dist'));
app.set('port', (process.env.PORT || 5001));
app.listen(app.get('port'), function() {
  console.log('Node app is running on port', app.get('port'));
});