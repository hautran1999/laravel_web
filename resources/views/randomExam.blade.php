@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('css/exam.css')}}">

<link rel="stylesheet" href="{{asset('css/createexam.css')}}">
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-3">
            <div class="grid">
                <div class="grid-header text-center">
                    <h5>Exam</h5>
                </div>
                <div class="grid-body">
                    <div style="height: 200px" class="text-center">
                        <h5>Time</h5>
                        <div><span id="display"></span></div>
                        <div><span id="submitted"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="grid">
                <div class="quiz-container">
                    <div id="quiz"></div>
                </div>
            </div>
            <div class="grid">
                <div class="grid-body">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <button id="previous" class="btn btn-success">Previous Question</button>
                        </div>
                        <div class="col-sm-4 text-center">
                            <form action="{{route('result_exam')}}" id='form' method="post">
                                @csrf
                                <input type="hidden" name="test" value="name">
                                <button id="submit" class="btn btn-danger">Submit Quiz</button>

                            </form>
                        </div>
                        <div class="col-sm-4 text-center">
                            <input type="button" id="next" class="btn btn-success" value="Next Question">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    (function () {
		const myQuestions = @json($quest);
		var timer = @json($time);
	
        function buildQuiz() {
			// we'll need a place to store the HTML output
			const output = [];

			// for each question...
			number = 0;
			myQuestions.forEach((currentQuestion, questionNumber) => {
				// we'll want to store the list of answer choices
				const answers = [];
				number++;
				// and for each available answer...
				for (letter in currentQuestion.answers) {
					var i = letter;
					if (letter == 0) { letter = 'A'; }
					if (letter == 1) { letter = 'B'; }
					if (letter == 2) { letter = 'C'; }
					if (letter == 3) { letter = 'D'; }
					if (letter == 4) { letter = 'E'; }
					if (letter == 5) { letter = 'F'; }

					// ...add an HTML radio button
					answers.push(
						`<div class="funkyradio">
						<div class="funkyradio-success">
            				<input type="radio" name="question${questionNumber}" value="${letter}" id=${'check' + questionNumber + letter} />
							<label for=${'check' + questionNumber + letter}>${letter} : ${currentQuestion.answers[i]}</label>
        				</div>
						</div>`
					);
				}

				// add this question and its answers to the output
				output.push(
					`<div class="slide">
            <div class="grid-header">
               <div class="row">
                  <div class="col-sm-2 text-center">Question ${number} :</div>
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

		var div = document.getElementById('display');
		var submitted = document.getElementById('submitted');
		function CountDown(display) {
			
			var minutes, seconds;
			//console.log(duration);
			var interVal = setInterval(function () {
				//console.log(timer);
				minutes = parseInt(timer / 60, 10);
				seconds = parseInt(timer % 60, 10);

				minutes = minutes < 10 ? "0" + minutes : minutes;
				seconds = seconds < 10 ? "0" + seconds : seconds;
				display.innerHTML = minutes + " : " + seconds;
				
				if (timer > 0) {
					--timer;
				} else if (timer==0) {
					SubmitFunction();
				}
			}, 1000);
		}
		function SubmitFunction() {
			submitted.innerHTML = "Time is up!";
			$('#submit').trigger('click');
		}

		function takeAnswer() {
			const answerContainers = quizContainer.querySelectorAll(".answers");
			let arr = [];

			myQuestions.forEach((currentQuestion, questionNumber) => {
				const answerContainer = answerContainers[questionNumber];
				const selector = `input[name=question${questionNumber}]:checked`;
				const userAnswer = (answerContainer.querySelector(selector) || {}).value;

				if (userAnswer == null) {
					arr.push('null');
				} else {
					arr.push(userAnswer);
				}
			});
			return arr;
		}
		function showResults() {
			arr = takeAnswer();
			$('#form').append(`<input type="hidden" name="score" value="${arr}">`)
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

		CountDown(div);
		// on submit, show results
		submitButton.addEventListener("click", showResults);
		previousButton.addEventListener("click", showPreviousSlide);
		nextButton.addEventListener("click", showNextSlide);
	})();

</script>
@endsection