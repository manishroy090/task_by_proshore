import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";

export default function Index() {
  const [questionnaires, Setquestionnaires] = useState([]);
  useEffect(() => {
    fetch("http://127.0.0.1:8000/api/questionnaires")
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        // data.map((item)=>{
        //    console.log(item)
        // })
        Setquestionnaires(data);
      });
  }, []);




  return (
    <div className="flex flex-col justify-center items-center  mt-32">
      <div className="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead className="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" className="px-6 py-3">
                Title
              </th>
              <th scope="col" className="px-6 py-3">
                Expiry Date
              </th>

              <th scope="col" className="px-6 py-3">
                NO.Questions
              </th>
              <th scope="col" className="px-6 py-3">
                NO.Physics Questions
              </th>
              <th scope="col" className="px-6 py-3">
                NO.Physics Chemistry
              </th>
              <th scope="col " className="px-6 py-3">
                <Link to="/add">
                  <button
                    type="button"
                    className="text-white ml-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                  >
                    Add
                  </button>
                </Link>
              </th>
            </tr>
          </thead>
          <tbody>
            {questionnaires.map((item) => (
              <tr className="text-black border-b" key={item.id}>
                <th
                  scope="row"
                  className="px-6 py-4 font-medium  whitespace-nowrap"
                >
                  {item.title}j
                </th>
                <td className="px-6 py-4">{item.expiry_date}</td>
                <td className="px-6 py-4">
                  {item.chemistry_question_count +
                    item.chemistry_question_count}
                </td>
                <td className="px-6 py-4">{item.chemistry_question_count}</td>
                <td className="px-6 py-4">{item.chemistry_question_count}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}
