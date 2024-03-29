import React, { useState } from "react";
export default function QuestionnaireForm() {
  const [title, setTitle] = useState({});
  const [expiry_date, setExpirydate] = useState({});

  const handleSubmit = (event) => {
    event.preventDefault();
    const questionnaire = {
      title,
      expiry_date,
    };
    fetch("http://127.0.0.1:8000/api/questionnaires/store", {
      method: "POST",
      body: JSON.stringify(questionnaire),
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
    })
      .then(function (response) {
        response.json().then(function (res) {
          window.location.replace("/");
        });
      })
      .catch(function (response) {
        console.log(response);
      });

  };

  return (
    <>
      <div className="flex flex-col justify-center items-center  mt-32">
        <form
          className="bg-white  overflow-hidden  shadow-2xl sm:rounded-lg p-10 w-96"
          onSubmit={handleSubmit}
        >
          <div className="py-4 px-8 font-bold text-xl border-b">
            <h1>Questionary form</h1>
          </div>
          <div className="flex flex-col space-y-6">
            <div className="flex flex-col">
              <label for="title" className="text-center">
                Title
              </label>
              <input
                type="text"
                id="title"
                name="title"
                className=" bg-neutral-100 rounded-md border border-black p-2"
                onChange={(event) => {
                  setTitle(event.target.value);
                }}
              />
            </div>

            <div className="flex flex-col">
              <label for="title" className="text-center">
                Expiry Date
              </label>
              <input
                type="date"
                id="title"
                name="expirydate"
                onChange={(event) => {
                  setExpirydate(event.target.value);
                }}
                className=" bg-neutral-100 rounded-md border border-black p-2"
              />
            </div>

            <button
              type="submit"
              className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 "
            >
              Generate
            </button>
          </div>
        </form>
      </div>
    </>
  );
}
