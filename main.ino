//Library LCD
#include <LiquidCrystal_I2C.h> 
LiquidCrystal_I2C lcd(0x27, 16, 2); // I2C address 0x27, 16 column and 2 rows

//library dan Var TDS Meter
#define TdsSensorPin A1
#define VREF 5.0      // analog reference voltage(Volt) of the ADC
#define SCOUNT  30           // sum of sample point
int analogBuffer[SCOUNT];    // store the analog value in the array, read from ADC
int analogBufferTemp[SCOUNT];
int analogBufferIndex = 0,copyIndex = 0;
float averageVoltage = 0,tdsValue = 0,temperature = 25;

//Library dan Var pH sensor
#include "ph_grav.h"                                  //header file for Atlas Scientific gravity pH sensor
#include "LiquidCrystal.h"                            //header file for liquid crystal display (lcd)

String inputstring = "";                              //a string to hold incoming data from the PC
boolean input_string_complete = false;                //a flag to indicate have we received all the data from the PC
char inputstring_array[10];                           //a char array needed for string parsing
Gravity_pH pH = A0;                                   //assign analog pin A0 of Arduino to class Gravity_pH. connect output of

//Libray dan Var DHT22
#include <DHT.h>;

//Constants
#define DHTPIN 7     // what pin we're connected to
#define DHTTYPE DHT22   // DHT 22  (AM2302)
DHT dht(DHTPIN, DHTTYPE); //// Initialize DHT sensor for normal 16mhz Arduino


//Variables
int chk;
float hum;  //Stores humidity value
float temp; //Stores temperature value

void setup(){
    //Set Komunikasi serial
    Serial.begin(115200);

    //LCD
    lcd.init(); // initialize the lcd
    lcd.backlight();

    //Set Pin mode
    pinMode(TdsSensorPin,INPUT);

    //Cek koneksi sensor pH
    if (pH.begin()) { Serial.println("Loaded EEPROM");} 

    //DHT
    dht.begin();
}

//pH
void serialEvent() {                                  //if the hardware serial port_0 receives a char
  inputstring = Serial.readStringUntil(13);           //read the string until we see a <CR>
  input_string_complete = true;                       //set the flag used to tell if we have received a completed string from the PC
}

void loop(){
    //TDS METER
    static unsigned long analogSampleTimepoint = millis();
   if(millis()-analogSampleTimepoint > 40U)     //every 40 milliseconds,read the analog value from the ADC
   {
     analogSampleTimepoint = millis();
     analogBuffer[analogBufferIndex] = analogRead(TdsSensorPin);    //read the analog value and store into the buffer
     analogBufferIndex++;
     if(analogBufferIndex == SCOUNT) 
         analogBufferIndex = 0;
   }   
   static unsigned long printTimepoint = millis();
   if(millis()-printTimepoint > 800U)
   {
      printTimepoint = millis();
      for(copyIndex=0;copyIndex<SCOUNT;copyIndex++)
        analogBufferTemp[copyIndex]= analogBuffer[copyIndex];
      averageVoltage = getMedianNum(analogBufferTemp,SCOUNT) * (float)VREF / 1024.0; // read the analog value more stable by the median filtering algorithm, and convert to voltage value
      float compensationCoefficient=1.0+0.02*(temperature-25.0);    //temperature compensation formula: fFinalResult(25^C) = fFinalResult(current)/(1.0+0.02*(fTP-25.0));
      float compensationVolatge=averageVoltage/compensationCoefficient;  //temperature compensation
      tdsValue=(133.42*compensationVolatge*compensationVolatge*compensationVolatge - 255.86*compensationVolatge*compensationVolatge + 857.39*compensationVolatge)*0.5; //convert voltage value to tds value
      //Serial.print("voltage:");
      //Serial.print(averageVoltage,2);
      //Serial.print("V   ");
      Serial.print("TDS Value:");
      Serial.print(tdsValue,0);
      Serial.println("ppm");
  

  lcd.setCursor(0, 0);
  lcd.print("TDS Value : "); 
  lcd.print(tdsValue,0);
  lcd.setCursor(3, 1);
  lcd.print("Techeonics"); 
   }

   //pH Sensor
    if (input_string_complete == true) {                //check if data received
    inputstring.toCharArray(inputstring_array, 30);   //convert the string to a char array
    parse_cmd(inputstring_array);                     //send data to pars_cmd function
    input_string_complete = false;                    //reset the flag used to tell if we have received a completed string from the PC
    inputstring = "";                                 //clear the string
  }
  Serial.println(pH.read_ph());                       //output pH reading to serial monitor
  lcd.setCursor(8, 2);                             //place cursor on screen at column 9, row 3
  lcd.print(pH.read_ph());                         //output pH to lcd
  //delay(1000);

  //DHT22
   hum = dht.readHumidity();
    temp= dht.readTemperature();
    //Print temp and humidity values to serial monitor
    Serial.print("Humidity: ");
    Serial.print(hum);
    Serial.print(" %, Temp: ");
    Serial.print(temp);
    Serial.println(" Celsius");
}

void parse_cmd(char* string) {                      //For calling calibration functions
  strupr(string);                                   //convert input string to uppercase

  if (strcmp(string, "CAL,4") == 0) {               //compare user input string with CAL,4 and if they match, proceed
    pH.cal_low();                                   //call function for low point calibration
    Serial.println("LOW CALIBRATED");
  }
  else if (strcmp(string, "CAL,7") == 0) {          //compare user input string with CAL,7 and if they match, proceed
    pH.cal_mid();                                   //call function for midpoint calibration
    Serial.println("MID CALIBRATED");
  }
  else if (strcmp(string, "CAL,10") == 0) {         //compare user input string with CAL,10 and if they match, proceed
    pH.cal_high();                                  //call function for highpoint calibration
    Serial.println("HIGH CALIBRATED");
  }
  else if (strcmp(string, "CAL,CLEAR") == 0) {      //compare user input string with CAL,CLEAR and if they match, proceed
    pH.cal_clear();                                 //call function for clearing calibration
    Serial.println("CALIBRATION CLEARED");
  }
}
