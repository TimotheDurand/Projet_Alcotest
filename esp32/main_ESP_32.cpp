#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "SSID";
const char* password = "mots de passe";

void initialiser_connexion(const char* ssid, const char* password) {
    Serial.begin(115200);
    WiFi.begin(ssid, password);

    Serial.println("\nEn attente de connexion WIFI ...");

    while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }
    Serial.println("\nConnecté au Wi-Fi !");
}


void send_data(float tauxAlcool) {

  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;

    String url = "http://ethyconnect.xyz/data/savedata.php?taux=" + String(tauxAlcool, 2);

    http.begin(url);

    int code = http.GET();

    Serial.println(http.getString());

    http.end();
  }
}

void setup() {
    initialiser_connexion(ssid, password);
}

void loop() {
    // code principal 
}
