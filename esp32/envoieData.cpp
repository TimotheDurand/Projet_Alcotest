#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "TON_WIFI";
const char* password = "MOT_DE_PASSE";

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
  }
}

void loop() {

  if(WiFi.status() == WL_CONNECTED){

    HTTPClient http;

    int valeur = analogRead(34);

    String url = "https://monsite.com/add_data.php?alcool=" + String(valeur);

    http.begin(url);
    http.GET();
    http.end();
  }

  delay(10000);
}
