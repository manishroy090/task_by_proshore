import React, { useState, useEffect } from "react";
import { json } from "react-router-dom";

export default function QuestionsForm() {
  const [questions, Setquestions] = useState([]);
  const [answers, setAnswers]= useState({});
  useEffect(() => {
    fetch("http://127.0.0.1:8000/api/questions")
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        // data.map((item)=>{
        //    console.log(item)
        // })
        Setquestions(data);
      });
  }, []);
    const handleAnswerChange=(questionNo,selectedanswer)=>{
       setAnswers((prevAnswers) => ({
         ...prevAnswers,
         [questionNo + 1]: selectedanswer,
       }));
    }
   const handleSubmit=()=>{
          fetch("http://127.0.0.1:8000/api/questions/store", {
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
        {questions.map((item, index) => (
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
        <button onClick={handleSubmit}>Submit</button>
      </div>
    </>
  );
}
