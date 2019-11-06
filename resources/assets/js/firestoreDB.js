import firebase from 'firebase/app';
import 'firebase/firestore';

const firebaseConfig = {
    apiKey: "AIzaSyCiIt5WwEk5ocH5aK4n3NFaeXsic8ZArDY",
    authDomain: "workforce-real-time-logs.firebaseapp.com",
    databaseURL: "https://workforce-real-time-logs.firebaseio.com",
    projectId: "workforce-real-time-logs",
    storageBucket: "workforce-real-time-logs.appspot.com",
    messagingSenderId: "219811177845",
    appId: "1:219811177845:web:235493ddbb00a25d155f3c",
    measurementId: "G-CS16RK4557"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
const db = firebase.firestore() ;

export default db ;
