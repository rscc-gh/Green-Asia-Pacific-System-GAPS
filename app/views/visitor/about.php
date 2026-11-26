<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/visitor-header.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/about.css">
</head>

<body>

    <!-- Header -->
    <?php include __DIR__ . '/../../layouts/visitor-header.php'; ?>

    <!-- Main Body -->
    <main class="about-page">

        <section class="about-hero">
            <h1>Let's make a greener world together, one step at a time</h1>
            <p class="about-hero-text">
                The Green Asia Pacific System allows its members to complete a range of green activities to
                 accumulate green points, which can subsequently be claimed as prizes by their business partner.

            </p>

            <div class="about-hero-actions">
                <a href="/?page=signup" class="about-cta">Sign Up</a>
                <a href="#how-it-works" class="about-cta about-cta-secondary">How it works</a>
            </div>
        </section>

        <section class="about-section">
            <h2>What GAPS does</h2>
            <p class="about-lead">
                GAPS will include 3 key parties; the Member, Business Partner and
                GAPS administrators and moderators. All parties work within the system to ensure its continued success.
            </p>

            <div class="about-cards">

                <div class="about-card">
                    <span class="about-card-number">01</span>
                    <h3>Participate</h3>
                    <p>
                        Partners will add various activities, goals and events to the website.
                         Members will select and complete these, submitting the required evidence.
                    </p>
                </div>

                <div class="about-card">
                    <span class="about-card-number">02</span>
                    <h3>Earn green points</h3>
                    <p>
                        After a moderator reviews and endorses the submitted evidence,
                         the relevant number of Green Points will be credited to the member.
                    </p>
                </div>

                <div class="about-card">
                    <span class="about-card-number">03</span>
                    <h3>Redeem rewards</h3>
                    <p>
                        Members can use their Green Points to claim a prize offered by any of their selected business partners.

                    </p>
                </div>

            </div>
        </section>

        <section class="about-section about-section-alt" id="how-it-works">
            <h2>How it works</h2>

            <ol class="about-steps">
                <li>Create an account and log in as a member or a business partner.</li>
                <li>Browse the activities, goals and events posted on the platform.</li>
                <li>Complete an activity and submit your proof of completion.</li>
                <li>A moderator verifies the proof and approves your green points.</li>
                <li>Redeem your points for rewards, or keep saving them for the leaderboard.</li>
            </ol>
        </section>

        <section class="about-section">
            <h2>Our mission</h2>

            <p>
                By framing sustainability as a burden, society causes the majority of citizens to disregard it.
                Instead, we aim to highlight that if we record and reward each positive step taken towards being more sustainable, we will be more inclined to act.
            </p>

            <p>
                Because the partners post the activities and the rewards, the impact stays local.
                A member who joins a clean-up is not earning points in an abstract game, they are
                contributing to something happening in their own community.
            </p>

            <ul class="about-values">
                <li><strong>Points are recorded.</strong> Every approved activity is saved as points.</li>
                <li><strong>Proof is checked.</strong> A moderator verifies a submission before points are given.</li>
                <li><strong>Everyone has a part.</strong> Members, partners, moderators and admins each do a different job.</li>
            </ul>
        </section>

        <section class="about-section about-section-alt">
            <h2>The team behind GAPS</h2>
            <p class="about-lead">GAPS is built by this amazing team.</p>

            <ul class="about-team">
                <li>
                    <strong>Tejeshwar Subramanian</strong>
                    <span class="about-team-role">Admin functions</span>
                </li>
                <li>
                    <strong>Tay Yong Han</strong>
                    <span class="about-team-role">Moderator functions</span>
                </li>
                <li>
                    <strong>Ryan Sern Chia Chien</strong>
                    <span class="about-team-role">Member functions</span>
                </li>
                <li>
                    <strong>Sriram Saminathan</strong>
                    <span class="about-team-role">Business partner functions</span>
                </li>
            </ul>
        </section>

        <section class="about-closing">
            <h2>Start earning green points</h2>
            <p>Create an account, pick an activity and let your actions count.</p>
            <a href="/?page=signup" class="about-cta">Create an account</a>
        </section>

    </main>

    <!-- Footer -->
    <?php include __DIR__ . '/../../layouts/footer.php'; ?>

</body>

</html>
