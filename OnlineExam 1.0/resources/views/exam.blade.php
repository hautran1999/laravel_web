@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('css/exam.css')}}">

<link rel="stylesheet" href="{{asset('css/createexam.css')}}">
<div class="container">
   <div class="row">
      <div class="col-sm-3">
         <div class="grid">
            <div class="quiz-container">
                  <div id="results"></div>
            </div>
         </div>
      </div>
      <div class="col-sm-9">
         <div class="grid">
            <div class="quiz-container">
               <div id="quiz"></div>
            </div>
            <div class="row">
               <div class="col-sm-4 text-center">
                  <button id="previous" class="btn btn-success">Previous Question</button>
               </div>
               <div class="col-sm-4 text-center">
                  <button id="submit" class="btn btn-danger">Submit Quiz</button>
               </div>
               <div class="col-sm-4 text-center">
                  <button id="next" class="btn btn-success">Next Question</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



<script>
   (function() {
  const myQuestions = @json($quest)

   function buildQuiz() {
    // we'll need a place to store the HTML output
      const output = [];

    // for each question...
      myQuestions.forEach((currentQuestion, questionNumber) => {
      // we'll want to store the list of answer choices
         const answers = [];

      // and for each available answer...
      for (letter in currentQuestion.answers) {
         var i=letter;
         if(letter == 0){letter = 'A';}
         if(letter == 1){letter = 'B';}
         if(letter == 2){letter = 'C';}
         if(letter == 3){letter = 'D';}
         if(letter == 4){letter = 'E';}
         if(letter == 5){letter = 'F';}

        // ...add an HTML radio button
         answers.push(
         `<div class="row showcase_row_area">
            <div class="col-sm-2 showcase_content_area text-right">
               <input type="radio" name="question${questionNumber}" value="${letter}">
            </div>
            <div class="col-sm-10 showcase_content_area">
               ${letter} : ${currentQuestion.answers[i]}
            </div>
         </div>`
         );
      }

      // add this question and its answers to the output
      output.push(
         `<div class="slide">
            <div class="grid-header">
               <div class="row">
                  <div class="col-sm-2 text-center">Question:</div>
                  <div class="col-sm-10 question border rounded border-dark">${currentQuestion.question}</div>
               </div>
            </div>
            <div class="grid-body">
               <div class="answers">${answers.join("")}</div>
            </div>
         </div>`
         );
      });

    // finally combine our output list into one string of HTML and put it on the page
      quizContainer.innerHTML = output.join("");
   }

   function showResults() {
    // gather answer containers from our quiz
      const answerContainers = quizContainer.querySelectorAll(".answers");

    // keep track of user's answers
      let numCorrect = 0;

    // for each question...
      myQuestions.forEach((currentQuestion, questionNumber) => {
      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      // if answer is correct
      if (userAnswer === currentQuestion.correctAnswer) {
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
        answerContainers[questionNumber].style.color = "lightgreen";
      } else {
        // if answer is wrong or blank
        // color the answers red
        answerContainers[questionNumber].style.color = "red";
      }
   });

    // show number of correct answers out of total
      resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length}`;
   }

   function showSlide(n) {
      slides[currentSlide].classList.remove("active-slide");
      slides[n].classList.add("active-slide");
      currentSlide = n;
    
      if (currentSlide === 0) {
         previousButton.style.display = "none";
      } else {
         previousButton.style.display = "inline-block";
      }
    
      if (currentSlide === slides.length - 1) {
         nextButton.style.display = "none";
         submitButton.style.display = "inline-block";
      } else {
         nextButton.style.display = "inline-block";
         submitButton.style.display = "inline-block";
      }
   }

   function showNextSlide() {
      showSlide(currentSlide + 1);
   }

   function showPreviousSlide() {
      showSlide(currentSlide - 1);
   }

   const quizContainer = document.getElementById("quiz");
   const resultsContainer = document.getElementById("results");
   const submitButton = document.getElementById("submit");

  // display quiz right away
   buildQuiz();

   const previousButton = document.getElementById("previous");
   const nextButton = document.getElementById("next");
   const slides = document.querySelectorAll(".slide");
   let currentSlide = 0;

   showSlide(0);

   // on submit, show results
   submitButton.addEventListener("click", showResults);
   previousButton.addEventListener("click", showPreviousSlide);
   nextButton.addEventListener("click", showNextSlide);
})();
   
</script>
@endsection