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

void send_data(float tauxAlcool){
    if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    String url = "http://adress/save_data.php?taux=" + String(tauxAlcool, 2);

    http.begin(url);
    int httpResponseCode = http.GET();
    
    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println(response);
    } else {
      Serial.print("Erreur HTTP: ");
      Serial.println(httpResponseCode);
    }
    http.end();
  }
}

void setup() {
    initialiser_connexion(ssid, password);
}

void loop() {
    // code principal 
}
