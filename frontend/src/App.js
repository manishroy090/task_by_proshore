import logo from './logo.svg';
import './App.css';
import React, {Component} from 'react';
import { BrowserRouter as Router, Routes, Route} from 'react-router-dom';
import Index from '../src/components/Index';
import QuestionnaireForm from './components/QuestionnaireForm';
import QuestionsForm from './components/QuestionsForm';

export default  class App extends Component{


   render(){

    return (
      <Router>
        <Routes>
          <Route
            exact
            path="/"
            element={
              <Index
                key="general"
                pageSize={9}
                country="in"
                category="general"
              ></Index>
            }
          />
          <Route
            exact
            path="/add"
            element={
              <QuestionnaireForm
                key="business"
                pageSize={9}
                country="in"
                category="business"
              ></QuestionnaireForm>
            }
          />

          <Route
            exact
            path="/questions/:id/:questionnaireId"
            element={
              <QuestionsForm
                key="business"
                pageSize={9}
                country="in"
                category="business"
              ></QuestionsForm>
            }
          />
        </Routes>
      </Router>
    );
   }
}
