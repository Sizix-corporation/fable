<?php
use Ably\AblyRest;
      
      $client = new AblyRest('wE-BTQ.XwG9Gg:7N1BB1JaZ-TRpfPCyjaUY5V_srt27OkxzqC2dd679VM');
      $channel = $client->channels->get('quickstart');
      $channel->publish('greeting', 'salut les gars!');