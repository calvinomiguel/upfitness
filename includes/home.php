<section class="main-section">
        <div class="main-wrapper">
            <h1>Get easily into shape</h1>
            <p>Up helps you getting and stay healthy. Get exercises, meal plan ideas and track your progress.</p>
            <div class="cta-wrapper">
                <button class="in-cta">GET FIT</button>
                <a class="out-cta" href="?page=login">LOGIN</a>
            </div>
            <?php print $registrationSuccess ?>
        </div>
        <div class="form-wrapper">
            <form class="form" name="subscription-form" method="post">
                <div class="page active">
                    <div class="form-page">
                        <h2>Get into shape easily</h2>
                        <p>Fill out the questionnaire and look directly at your BMI and start working out from
                            there.</p>
                        <div class="first-btn-wrapper">
                            <button class="next-btn" type="button" name="button">GET STARTED</button>
                        </div>
                    </div>
                </div>
                <div class="page page-2">
                    <div class="form-page">
                        <h2>Tell us more about you</h2>
                        <p>What is your goal?</p>
                        <label class="field-choice" for="lose-weight">
                            <input id="lose-weight" type="radio" name="goal" value="Lose weight">
                            Lose weight
                        </label>
                        <label class="field-choice" for="muscles">
                            <input id="muscles" type="radio" name="goal" value="Build muscles">
                            Build muscles
                        </label>
                        <span id="goal-err" class="err-message out-container"><i class="fas fa-times-circle"></i>Please choose your fitness goal.</span>
                        <div class="form-bottom">
                            <div class="counter-wrapper">
                                <p class="page-counter">Step 1 from 6</p>
                            </div>
                            <div class="btn-wrapper">
                                <button class="previous-btn" type="button" name="button">GO BACK</button>
                                <button class="next-btn" type="button" name="button">NEXT</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page page-3">
                    <div class="form-page">
                        <h2>Tell us more about you</h2>
                        <p>What is your sex?</p>
                        <label class="field-choice" for="male">
                            <input id="male" type="radio" name="sex" value="Male">
                            Male
                        </label>
                        <label class="field-choice" for="female">
                            <input id="female" type="radio" name="sex" value="Female">
                            Female
                        </label>
                        <span id="sex-err" class="err-message out-container"><i class="fas fa-times-circle"></i>Please choose your sex.</span>
                        <div class="form-bottom">
                            <div class="counter-wrapper">
                                <p class="page-counter">Step 2 from 6</p>
                            </div>
                            <div class="btn-wrapper">
                                <button class="previous-btn" type="button" name="button">GO BACK</button>
                                <button class="next-btn" type="button" name="button">NEXT</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page page-4">
                    <div class="form-page">
                        <h2>Tell us more about you</h2>
                        <p>What is your birth date?</p>
                        <label class="field-choice text-field date" for="height">
                            <input id="datepicker" type="text" name="birthdate"  placeholder=" Day / Month / Year " value="">
                        </label>
                        <span id="date-err" class="err-message out-container"><i class="fas fa-times-circle"></i>Please enter your birth date.</span>
                        <div class="form-bottom">
                            <div class="counter-wrapper">
                                <p class="page-counter">Step 3 from 6</p>
                            </div>
                            <div class="btn-wrapper">
                                <button class="previous-btn" type="button" name="button">GO BACK</button>
                                <button class="next-btn" type="button" name="button">NEXT</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page page-5">
                    <div class="form-page">
                        <h2>Tell us more about you</h2>
                        <p>What is your height?</p>
                        <label class="field-choice text-field height" for="height">
                            <input id="height" type="number" name="height" placeholder="e.g. 162" value="">
                        </label>
                        <span id="height-err" class="err-message out-container"><i class="fas fa-times-circle"></i>Please enter your height.</span>
                        <div class="form-bottom">
                            <div class="counter-wrapper">
                                <p class="page-counter">Step 4 from 6</p>
                            </div>
                            <div class="btn-wrapper">
                                <button class="previous-btn" type="button" name="button">GO BACK</button>
                                <button class="next-btn" type="button" name="button">NEXT</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page page-6">
                    <div class="form-page">
                        <h2>Tell us more about you</h2>
                        <p>What is your current weight?</p>
                        <label class="field-choice text-field weight" for="weight">
                            <input id="weight" type="number" name="weight" placeholder="e.g. 63" value="">
                        </label>
                        <span id="weight-err" class="err-message out-container"><i class="fas fa-times-circle"></i>Please enter your weight.</span>
                        <div class="form-bottom">
                            <div class="counter-wrapper">
                                <p class="page-counter">Step 5 from 6</p>
                            </div>
                            <div class="btn-wrapper">
                                <button class="previous-btn" type="button" name="button">GO BACK</button>
                                <button class="next-btn" type="button" name="button">NEXT</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page page-7">
                    <div class="form-page">
                        <h2>Create your account</h2>
                        <p>Create an account in order to start your journey.</p>
                        <label class="subscribe-field" for="email">
                            Your email
                            <input id="email" type="text" name="email" placeholder="e.g. john@example.com" value="">
                        </label>
                        <span id="email-err" class="err-message out-container"><i class="fas fa-times-circle"></i>Please type a valid email address.</span>
                        <label class="subscribe-field" for="password">
                            Type your password
                            <input id="password" type="password" name="password" placeholder="••••••••••••" value="">
                        </label>
                        <span id="password-err" class="err-message out-container">Type your password.</span>
                        <label class="subscribe-field" for="password-retype">
                            Retype your password
                            <input id="password-retype" type="password" name="password-retype"
                                   placeholder="••••••••••••" value="">
                        </label>
                        <span id="password-retype-err" class="err-message out-container">Your password has to have at least 8 signs, an uppercase and lowercase
							letter and a number.</span>
                        <div class="form-bottom">
                            <div class="counter-wrapper">
                                <p class="page-counter">Step 6 from 6</p>
                            </div>
                            <?php print $registrationSuccess; ?>
                            <div class="btn-wrapper">
                                <button class="previous-btn" type="button" name="button">GO BACK</button>
                                <button class="next-btn" type="submit" name="submit-subscription">NEXT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
