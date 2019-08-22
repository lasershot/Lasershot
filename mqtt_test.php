<script src="paho.javascript-1.0.3/paho-mqtt.js"></script>
<script>
  var clientid = Math.floor(Math.random() * (500000 - 100000)) + 100000;
  client = new Paho.MQTT.Client("broker.mqttdashboard.com", Number(8000), String(clientid));
  client.onConnectionLost = onConnectionLost;
  client.onMessageArrived = onMessageArrived;

  client.connect({onSuccess:onConnect});
  var score = 0;
  var topic_sup = "test_input";
  var topic_pub = "test_output";
  var mq_to_msg;
  var state_call = 0;
  function onConnect() {
    console.log("onConnect");
    client.subscribe(topic_sup);
    state_call = 1;
  }

  function send(msg){
    if (msg == 'R'){
      score = 0;
      document.getElementById("sub_mqtt").innerHTML = "Score: "+score;
    }
    else if (msg == 'S'){
      message = new Paho.MQTT.Message(document.getElementById("score").value);
      message.destinationName = topic_pub;
      client.send(message);
    }
    else{
      message = new Paho.MQTT.Message(msg);
      message.destinationName = topic_pub;
      client.send(message);
    }
  }

  function onConnectionLost(responseObject) {
    if (responseObject.errorCode !== 0) {
      console.log("onConnectionLost:"+responseObject.errorMessage);
    }
  }

  function onMessageArrived(message) {
    mq_to_msg = message.payloadString;
    console.log("onMessageArrived:"+mq_to_msg);
    num = Number(mq_to_msg);
    // check_score(mq_to_msg);
    if (isNumeric(num)){
      // check_score(mq_to_msg);
      if (num == 1) {
          state_score = 1;
          score += 1;
      } else if (num == -1) {
          state_score = 1;
          hp_player -= 10;
      } else if (num == 2) {
          state_score = 1;
          score += 1;
          hp_player += 5
      }
      // console.log(mq_to_msg);
      document.getElementById("score").innerHTML = "SCORE : "+score;
    }
    document.getElementById("hp_player").innerHTML = "HP : "+hp_player;
  }

  function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
  }
</script>