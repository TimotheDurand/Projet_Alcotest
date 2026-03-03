#include <WiFi.h>

const char* ssid = "NomDuWifi";
const char* password = "MotDePasse";

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);

  Serial.print("Connexion");

  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("Connecté !");
  Serial.println(WiFi.localIP());
}

void loop() {
}
