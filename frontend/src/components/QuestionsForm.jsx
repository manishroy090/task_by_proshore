import React, { useState, useEffect } from "react";
import {useParams} from "react-router-dom";
import CryptoJS from "crypto-js";

export default function QuestionsForm() {
  const [physicsQuestions, SetPhysicsquestions] = useState([]);
    const [chemistryQuestions, SetChemistryquestions] = useState([]);
  const [answers, setAnswers]= useState({});
  const { id, questionnaireId } = useParams();
  useEffect(() => {
    fetch(`http://127.0.0.1:8000/api/questions/${questionnaireId}`)
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        // data.map((item)=>{
        //    console.log(item)
        // })

        SetPhysicsquestions(data.physicsQuestions);
        SetChemistryquestions(data.chemistryQuestions);
      });
  }, []);
    const handleAnswerChange=(questionNo,selectedanswer)=>{
       setAnswers((prevAnswers) => ({
         ...prevAnswers,
         [questionNo + 1]:selectedanswer,
         'id':id
       }));
    }
   const handleSubmit=()=>{
    console.log(answers);
          fetch(`http://127.0.0.1:8000/api/questions/store`, {
            method: "POST",
            body: JSON.stringify(answers),
            headers: {
              Accept: "application/json",
              "Content-Type": "application/json",
            },
          })
            .then(function (response) {
              console.log(response);
            })
            .catch(function (response) {
              console.log(response);
            });
   };
  return (
    <>
      <div className="container mx-auto">
        <div>
          <h1 className="font-semibold  text-2xl mb-4">Physics Questions</h1>
          {physicsQuestions.map((item, index) => (
            <div key={index} className="ml-4">
              <p>
                {index + 1}. {item.question}
              </p>

              {JSON.parse(item.options).map((option, optionIndex) => (
                <div key={optionIndex} className="flex space-x-4">
                  <input
                    className="self-center"
                    type="radio"
                    id={`option${optionIndex}`}
                    name={`answer${index}`} // Use the index of the question for the name attribute
                    value={option}
                    onChange={() => handleAnswerChange(index, option)}
                  />
                  <label htmlFor={`option${optionIndex}`} className="mt-2">
                    {option}
                  </label>
                </div>
              ))}
            </div>
          ))}
        </div>

        <div>
          <h1 className="font-semibold  text-2xl mb-4">Chemistry Questions</h1>
          {chemistryQuestions.map((item, index) => (
            <div key={index} className="ml-4">
              <p>
                {index + 1}. {item.question}
              </p>

              {JSON.parse(item.options).map((option, optionIndex) => (
                <div key={optionIndex} className="flex space-x-4">
                  <input
                    className="self-center"
                    type="radio"
                    id={`option${optionIndex}`}
                    name={`answer${index}`} // Use the index of the question for the name attribute
                    value={option}
                    onChange={() => handleAnswerChange(index, option)}
                  />
                  <label htmlFor={`option${optionIndex}`} className="mt-2">
                    {option}
                  </label>
                </div>
              ))}
            </div>
          ))}
        </div>
        <button onClick={handleSubmit} className="bg-blue-600 p-2 text-white font-semibold borer rounded-md">Submit</button>
      </div>
    </>
  );
}
