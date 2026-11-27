<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/functions.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) { http_response_code(404); exit('Post not found.'); }
$stmt = $pdo->prepare("SELECT p.*, c.name AS category_name FROM posts p JOIN categories c ON c.id=p.category_id WHERE p.id=? AND p.status='published'");
$stmt->execute([$id]);
$post = $stmt->fetch();
if (!$post) { http_response_code(404); exit('Post not found.'); }
$pageTitle = $post['title'];
require __DIR__ . '/includes/header.php';
?>
<div class="mb-3"><a href="index.php" class="text-decoration-none">← Back to lessons</a></div>
<article class="card border-0 shadow-sm rounded-4"><div class="card-body p-4 p-md-5">
<span class="badge category-badge mb-3"><?= e($post['category_name']) ?></span>
<h1 class="display-6 fw-bold"><?= e($post['title']) ?></h1>
<p class="text-secondary mb-4">Published <?= date('F j, Y', strtotime($post['created_at'])) ?></p>
<div class="post-content"><?= nl2br(e($post['content'])) ?></div>
</div></article>
<?php require __DIR__ . '/includes/footer.php'; ?>
