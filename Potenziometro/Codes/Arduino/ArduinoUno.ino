int Potenziometro = 0;
  
void setup()
{
  pinMode(13, OUTPUT);
  pinMode(12, OUTPUT);
  pinMode(11, OUTPUT);
  pinMode(10, OUTPUT);
  pinMode(9, OUTPUT);
  pinMode(3, OUTPUT);
  pinMode(0, INPUT);
  Serial.begin(9600);
}

void loop()
{
  Potenziometro = analogRead(0);
  if(Potenziometro > 0 && Potenziometro < 280){
  	digitalWrite(13, HIGH);
    digitalWrite(12, LOW);
    digitalWrite(11, LOW);
    digitalWrite(10, LOW);
    digitalWrite(9, LOW);
  }else if(Potenziometro < 450){
  	digitalWrite(13, HIGH);
    digitalWrite(12, HIGH);
    digitalWrite(11, LOW);
    digitalWrite(10, LOW);
    digitalWrite(9, LOW);
  }else if(Potenziometro < 640){
  	digitalWrite(13, HIGH);
    digitalWrite(12, HIGH);
    digitalWrite(11, HIGH);
    digitalWrite(10, LOW);
    digitalWrite(9, LOW);
  }else if(Potenziometro < 890){
  	digitalWrite(13, HIGH);
    digitalWrite(12, HIGH);
    digitalWrite(11, HIGH);
    digitalWrite(10, HIGH);
    digitalWrite(9, LOW);
  }else if(Potenziometro <= 1023){
  	digitalWrite(13, HIGH);
    digitalWrite(12, HIGH);
    digitalWrite(11, HIGH);
    digitalWrite(10, HIGH);
    digitalWrite(9, HIGH);
  }else{
  	digitalWrite(13, LOW);
    digitalWrite(12, LOW);
    digitalWrite(11, LOW);
    digitalWrite(10, LOW);
    digitalWrite(9, LOW);
  }
  Serial.println(Potenziometro);
}