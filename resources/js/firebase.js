import firebase from 'firebase';

const firebaseConfig = {
    apiKey: "AIzaSyCRceLyYBr2CH5bsO6ikaBGKy0HgY8oqw4",
    authDomain: "chat-france-883fa.firebaseapp.com",
    databaseURL: "https://chat-france-883fa-default-rtdb.firebaseio.com",
    projectId: "chat-france-883fa",
    storageBucket: "chat-france-883fa.appspot.com",
    messagingSenderId: "444381494404",
    appId: "1:444381494404:web:448f5b2f31acf9f0bb96d1",
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  export default firebase;