<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Student Learning Hub';
$categories = $pdo->query("SELECT id, name FROM categories ORDER BY name")->fetchAll();
$stmt = $pdo->query("SELECT p.id, p.title, p.content, p.created_at, c.name AS category_name
                     FROM posts p JOIN categories c ON c.id = p.category_id
                     WHERE p.status = 'published' ORDER BY p.created_at DESC");
$posts = $stmt->fetchAll();
require __DIR__ . '/includes/header.php';
?>
<section class="hero rounded-4 p-4 p-md-5 mb-4">
  <div class="row align-items-center">
    <div class="col-lg-8">
      <span class="badge text-bg-light mb-3">LEARN • GROW • SUCCEED</span>
      <h1 class="display-5 fw-bold">Welcome to your learning space</h1>
      <p class="lead mb-0">Explore lessons, discover useful ideas, and build your skills one step at a time.</p>
    </div>
    <div class="col-lg-4 text-lg-end mt-4 mt-lg-0"><span class="hero-icon">📚</span></div>
  </div>
</section>
<div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
  <div><h2 class="section-title mb-1">Latest lessons</h2><p class="text-secondary mb-0">Browse the latest learning posts.</p></div>
  <span class="badge rounded-pill text-bg-primary"><?= count($posts) ?> lessons</span>
</div>
<div class="row g-4">
<?php if (!$posts): ?>
  <div class="col-12"><div class="alert alert-info">No lessons have been published yet.</div></div>
<?php endif; ?>
<?php foreach ($posts as $post): ?>
  <div class="col-md-6 col-xl-4">
    <article class="card lesson-card h-100 border-0 shadow-sm">
      <div class="card-body p-4">
        <span class="badge category-badge mb-3"><?= e($post['category_name']) ?></span>
        <h3 class="h5 fw-bold"><?= e($post['title']) ?></h3>
        <p class="text-secondary"><?= e(excerpt($post['content'], 125)) ?></p>
        <div class="d-flex justify-content-between align-items-center mt-4">
          <small class="text-secondary"><?= date('M j, Y', strtotime($post['created_at'])) ?></small>
          <a class="btn btn-sm btn-outline-primary" href="post.php?id=<?= (int)$post['id'] ?>">Read lesson</a>
        </div>
      </div>
    </article>
  </div>
<?php endforeach; ?>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
