function soap() {
  // var data = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<soap12:Envelope xmlns:soap12=\"http://www.w3.org/2003/05/soap-envelope\">\n  <soap12:Body>\n    <ListOfContinentsByName xmlns=\"http://www.oorsprong.org/websamples.countryinfo\">\n    </ListOfContinentsByName>\n  </soap12:Body>\n</soap12:Envelope>";

  // var xhr = new XMLHttpRequest();
  // xhr.withCredentials = true;
  
  // xhr.addEventListener("readystatechange", function() {
  //   if(this.readyState === 4) {
  //     console.log(this.responseText);
  //   }
  // });
  
  // xhr.open("POST", "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso");
  // xhr.setRequestHeader("Content-Type", "text/xml; charset=utf-8");
  
  // xhr.send(data);

  // var myHeaders = new Headers();
  // myHeaders.append("Content-Type", "text/xml; charset=utf-8");
  // // myHeaders.append('Access-Control-Allow-Origin', '*');
  // // myHeaders.append('Access-Control-Allow-Credentials', 'true');

  
  // var raw = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<soap12:Envelope xmlns:soap12=\"http://www.w3.org/2003/05/soap-envelope\">\n  <soap12:Body>\n    <ListOfCountryNamesByName xmlns=\"http://www.oorsprong.org/websamples.countryinfo\">\n    </ListOfCountryNamesByName>\n  </soap12:Body>\n</soap12:Envelope>";
  
  // var requestOptions = {
  //   method: 'POST',
  //   headers: myHeaders,
  //   body: raw,
  //   redirect: 'follow'
  // };
  
  // fetch("http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso", requestOptions)
  //   .then(response => response.text())
  //   .then(result => console.log(result))
  //   .catch(error => console.log('error', error));


//   var myHeaders = new Headers();
// myHeaders.append("Content-Type", "text/xml; charset=utf-8");

// var raw = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<soap:Envelope xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">\n  <soap:Body>\n    <NumberToWords xmlns=\"http://www.dataaccess.com/webservicesserver/\">\n      <ubiNum>500</ubiNum>\n    </NumberToWords>\n  </soap:Body>\n</soap:Envelope>";

// var requestOptions = {
//   method: 'POST',
//   headers: myHeaders,
//   body: raw,
//   redirect: 'follow'
// };

// fetch("https://www.dataaccess.com/webservicesserver/NumberConversion.wso", requestOptions)
//   .then(response => response.text())
//   .then(result => console.log(result))
//   .catch(error => console.log('error', error));


var data = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<soap:Envelope xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">\n  <soap:Body>\n    <NumberToWords xmlns=\"http://www.dataaccess.com/webservicesserver/\">\n      <ubiNum>500</ubiNum>\n    </NumberToWords>\n  </soap:Body>\n</soap:Envelope>";

var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function() {
  if(this.readyState === 4) {
    console.log(this.responseText);
  }
});

xhr.open("POST", "https://www.dataaccess.com/webservicesserver/NumberConversion.wso");
xhr.setRequestHeader("Content-Type", "text/xml; charset=utf-8");

xhr.send(data);

}

