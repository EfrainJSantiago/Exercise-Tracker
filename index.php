<?php
// Inicia la sesion para poder usar $_SESSION en esta pagina
session_start();      // Para guardar quien inicio la sesion
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Catalog | Workout Routine Manager</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a href="index.html" class="brand">
                FitTrack PHP
                <span>Exercise &amp; Workout Routine Manager</span>
            </a>
            <nav class="main-nav">
                <!-- PHP TODO: Dynamically show count from $_SESSION['routine'], and toggle "+ Add Exercise" / "Logout" based on $_SESSION['username'] -->
                <a href="index.html" class="active">Exercise Catalog</a>
                <a href="routine_builder.html">Active Routine (3)</a>
                <a href="saved_routine.html">Saved Routines</a>
                <a href="exercise_form.html">+ Add Exercise</a>
                <a href="login.php">Login / Register</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="dev-banner">
            <strong>Starter Front-End Template:</strong> The 15 exercises below are hardcoded from
            <code>exercise_tracker.sql</code>. Replace this static markup with a PHP <code>foreach</code>
            loop querying your MySQL <code>exercises</code> and <code>muscle_groups</code> tables via PDO.
        </div>

        <div class="page-header">
            <div>
                <h1>Exercise Catalog</h1>
                <p class="subtitle">Browse exercises by muscle group and add them to your active workout routine.</p>
            </div>
            <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
                <a href="routine_builder.html" class="btn btn-secondary">View Active Routine (3)</a>
                <!-- PHP TODO: Wrap this button in an if (isset($_SESSION['username'])) check -->
                <a href="exercise_form.html" class="btn btn-primary">+ Add New Exercise</a>
            </div>
        </div>

        <!-- Muscle Group Filter Bar (PHP TODO: Dynamically generate from muscle_groups table) -->
        <div class="filter-bar">
            <a href="index.html" class="filter-pill active">All Groups (15)</a>
            <a href="?muscle_group_id=1" class="filter-pill">Chest</a>
            <a href="?muscle_group_id=2" class="filter-pill">Back</a>
            <a href="?muscle_group_id=3" class="filter-pill">Legs</a>
            <a href="?muscle_group_id=4" class="filter-pill">Shoulders</a>
            <a href="?muscle_group_id=5" class="filter-pill">Arms</a>
            <a href="?muscle_group_id=6" class="filter-pill">Core</a>
        </div>

        <!-- Exercise Cards Grid -->
        <section class="exercise-grid">
            <!-- Exercise 1 -->
            <article class="exercise-card">
                <div>
                    <h3>Barbell Bench Press</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Chest</span>
                        <span class="badge badge-intermediate">Intermediate</span>
                        <span>Equipment: <strong>Barbell</strong></span>
                    </div>
                    <p class="instructions-text">Lie flat on a bench with feet planted firmly on the floor. Grip the barbell slightly wider than shoulder-width, lower it under control to mid-chest, and press upward until arms are extended.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="1">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="10" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="135" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=1" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="1">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 2 -->
            <article class="exercise-card">
                <div>
                    <h3>Incline Dumbbell Press</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Chest</span>
                        <span class="badge badge-intermediate">Intermediate</span>
                        <span>Equipment: <strong>Dumbbell</strong></span>
                    </div>
                    <p class="instructions-text">Set an adjustable bench to a 30-45 degree angle. Press a pair of dumbbells from shoulder height directly upward, then lower slowly with elbows at a 45-degree angle to the torso.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="2">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="10" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="50" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=2" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="2">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 3 -->
            <article class="exercise-card">
                <div>
                    <h3>Push-Ups</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Chest</span>
                        <span class="badge badge-beginner">Beginner</span>
                        <span>Equipment: <strong>Bodyweight</strong></span>
                    </div>
                    <p class="instructions-text">Start in a high plank position with hands slightly wider than shoulder-width. Keep your core braced and body in a straight line as you lower your chest toward the floor and push back up.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="3">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="15" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="0" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=3" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="3">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 4 -->
            <article class="exercise-card">
                <div>
                    <h3>Barbell Deadlift</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Back</span>
                        <span class="badge badge-advanced">Advanced</span>
                        <span>Equipment: <strong>Barbell</strong></span>
                    </div>
                    <p class="instructions-text">Stand with feet hip-width apart and the barbell over mid-foot. Hinge at the hips, grip the bar just outside your knees, brace your core, and drive through your heels to stand tall.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="4">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="5" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="225" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=4" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="4">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 5 -->
            <article class="exercise-card">
                <div>
                    <h3>Pull-Ups</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Back</span>
                        <span class="badge badge-intermediate">Intermediate</span>
                        <span>Equipment: <strong>Bodyweight</strong></span>
                    </div>
                    <p class="instructions-text">Hang from a pull-up bar with an overhand grip slightly wider than shoulder-width. Pull your chest toward the bar by driving your elbows down, then lower yourself under full control.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="5">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="8" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="0" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=5" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="5">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 6 -->
            <article class="exercise-card">
                <div>
                    <h3>Seated Cable Row</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Back</span>
                        <span class="badge badge-beginner">Beginner</span>
                        <span>Equipment: <strong>Cable</strong></span>
                    </div>
                    <p class="instructions-text">Sit at a low pulley row station with knees slightly bent and spine neutral. Pull the handle toward your lower ribcage while squeezing your shoulder blades together, then return slowly.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="6">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="12" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="90" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=6" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="6">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 7 -->
            <article class="exercise-card">
                <div>
                    <h3>Barbell Back Squat</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Legs</span>
                        <span class="badge badge-intermediate">Intermediate</span>
                        <span>Equipment: <strong>Barbell</strong></span>
                    </div>
                    <p class="instructions-text">Rest the barbell across your upper traps with feet shoulder-width apart. Sit back and down until thighs are at least parallel to the floor, keeping your chest up, then drive back to standing.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="7">
                        <input type="number" name="sets" value="4" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="8" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="185" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=7" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="7">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 8 -->
            <article class="exercise-card">
                <div>
                    <h3>Romanian Deadlift</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Legs</span>
                        <span class="badge badge-intermediate">Intermediate</span>
                        <span>Equipment: <strong>Barbell</strong></span>
                    </div>
                    <p class="instructions-text">Hold a barbell at hip level with a slight bend in your knees. Push your hips backward while lowering the bar along your shins until you feel a deep hamstring stretch, then return to the top.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="8">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="10" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="135" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=8" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="8">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 9 -->
            <article class="exercise-card">
                <div>
                    <h3>Dumbbell Walking Lunges</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Legs</span>
                        <span class="badge badge-beginner">Beginner</span>
                        <span>Equipment: <strong>Dumbbell</strong></span>
                    </div>
                    <p class="instructions-text">Hold a dumbbell in each hand at your sides. Step forward into a lunge until both knees form 90-degree angles, push off your front foot to step forward into the next repetition.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="9">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="12" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="30" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=9" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="9">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 10 -->
            <article class="exercise-card">
                <div>
                    <h3>Overhead Barbell Press</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Shoulders</span>
                        <span class="badge badge-intermediate">Intermediate</span>
                        <span>Equipment: <strong>Barbell</strong></span>
                    </div>
                    <p class="instructions-text">Stand with the barbell resting across your front shoulders, hands just outside shoulder-width. Brace your core and press the bar straight overhead until your arms lock out.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="10">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="8" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="95" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=10" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="10">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 11 -->
            <article class="exercise-card">
                <div>
                    <h3>Dumbbell Lateral Raises</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Shoulders</span>
                        <span class="badge badge-beginner">Beginner</span>
                        <span>Equipment: <strong>Dumbbell</strong></span>
                    </div>
                    <p class="instructions-text">Stand tall holding dumbbells at your sides with a slight bend in the elbows. Raise your arms out to the sides until they reach shoulder height, pause briefly, and lower slowly.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="11">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="15" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="15" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=11" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="11">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 12 -->
            <article class="exercise-card">
                <div>
                    <h3>Barbell Bicep Curl</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Arms</span>
                        <span class="badge badge-beginner">Beginner</span>
                        <span>Equipment: <strong>Barbell</strong></span>
                    </div>
                    <p class="instructions-text">Stand with feet shoulder-width apart holding a barbell with an underhand grip. Keep your elbows tucked at your sides as you curl the weight toward your shoulders and lower under control.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="12">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="12" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="65" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=12" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="12">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 13 -->
            <article class="exercise-card">
                <div>
                    <h3>Tricep Rope Pushdown</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Arms</span>
                        <span class="badge badge-beginner">Beginner</span>
                        <span>Equipment: <strong>Cable</strong></span>
                    </div>
                    <p class="instructions-text">Attach a rope handle to a high cable pulley. Keeping your upper arms pinned to your torso, extend your forearms downward and spread the rope ends apart at the bottom.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="13">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="12" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="45" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=13" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="13">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 14 -->
            <article class="exercise-card">
                <div>
                    <h3>Forearm Plank</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Core</span>
                        <span class="badge badge-beginner">Beginner</span>
                        <span>Equipment: <strong>Bodyweight</strong></span>
                    </div>
                    <p class="instructions-text">Support your body on your forearms and toes with elbows directly beneath your shoulders. Maintain a neutral spine and braced abdominal muscles for the target duration.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="14">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="45" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="0" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=14" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="14">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
            <!-- Exercise 15 -->
            <article class="exercise-card">
                <div>
                    <h3>Hanging Leg Raises</h3>
                    <div class="meta-row">
                        <span class="badge badge-group">Core</span>
                        <span class="badge badge-advanced">Advanced</span>
                        <span>Equipment: <strong>Bodyweight</strong></span>
                    </div>
                    <p class="instructions-text">Hang from a pull-up bar with straight arms. Engaging your core and avoiding momentum, raise your legs until they are parallel to the floor (or higher) and lower slowly.</p>
                </div>
                <div class="card-actions">
                    <!-- Public Routine Builder Quick-Add Form (Available to Guests & Logged-In Users) -->
                    <form action="index.php" method="post" class="routine-quick-form">
                        <input type="hidden" name="action" value="add_to_routine">
                        <input type="hidden" name="exercise_id" value="15">
                        <input type="number" name="sets" value="3" min="1" max="20" aria-label="Sets" title="Sets" required>
                        <input type="number" name="reps" value="12" min="1" max="100" aria-label="Reps" title="Reps" required>
                        <input type="number" name="weight" value="0" min="0" step="0.5" aria-label="Weight" title="Weight (lbs)" required>
                        <button type="submit" class="btn btn-primary btn-sm">+ Routine</button>
                    </form>
                    <!-- PHP TODO: Show Edit/Delete controls ONLY when $_SESSION['username'] is authenticated -->
                    <div class="admin-actions">
                        <a href="exercise_form.html?exercise_id=15" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="index.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete_exercise">
                            <input type="hidden" name="exercise_id" value="15">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
        </section>
    </main>

    <footer class="site-footer">
        PHP &amp; MySQL Final Project &bull; Starter Front-End Template
    </footer>
</body>
</html>
