<?php
$sidebarPosts = $sidebarPosts ?? array_slice(je_blog_posts(), 0, 8, true);
?>
<aside class="je-blog-sidebar">
    <div class="je-side-box">
        <h3>Get Course Guidance</h3>
        <form action="lead-submit.php" method="post">
            <input type="hidden" name="source" value="Blog Sidebar">
            <input class="je-form-control" type="text" name="name" placeholder="Your Name" required>
            <input class="je-form-control" type="tel" name="phone" placeholder="Mobile Number" required>
            <input class="je-form-control" type="email" name="email" placeholder="Email Address">
            <select class="je-form-control" name="course">
                <option value="Course Guidance">Course Guidance</option>
                <option value="Full Stack Development">Full Stack Development</option>
                <option value="Java Full Stack">Java Full Stack</option>
                <option value="Python Programming">Python Programming</option>
                <option value="Data Science">Data Science</option>
                <option value="Cloud Computing">Cloud Computing</option>
                <option value="Cyber Security">Cyber Security</option>
            </select>
            <button class="je-submit-btn" type="submit">Request Callback</button>
        </form>
    </div>

    <div class="je-side-box">
        <h3>Course Links</h3>
        <ul class="je-side-links">
            <li><a href="courses.php">All IT Courses</a></li>
            <li><a href="java-full-stack-course-jaipur.php">Java Full Stack Course</a></li>
            <li><a href="full-stack-development-course-jaipur.php">Full Stack Development</a></li>
            <li><a href="python-programming-course-jaipur.php">Python Programming</a></li>
            <li><a href="data-science-course-jaipur.php">Data Science</a></li>
            <li><a href="cloud-computing-course-jaipur.php">Cloud Computing</a></li>
            <li><a href="cyber-security-course-jaipur.php">Cyber Security</a></li>
        </ul>
    </div>

    <div class="je-side-box">
        <h3>Popular Blogs</h3>
        <ul class="je-side-links">
            <?php foreach ($sidebarPosts as $sidePost): ?>
                <li><a href="blogs/post.php?slug=<?php echo htmlspecialchars($sidePost['slug'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($sidePost['title'], ENT_QUOTES, 'UTF-8'); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>