<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<!--  Admin Section -->

<!-- Display User Credentials (Email, Username And Password) -->

<!-- Summary Of UserHolidays -->




<!-- Summary Of UserTimesheets -->



<!-- Pending Holidays -->

  <h3><?= __('Admin Pending Holidays') ?></h3>
     <table cellpadding="0" cellspacing="0">
         <thead>
             <tr>
                 <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('days_taken') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                 <th scope="col" class="actions"><?= __('Actions') ?></th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($user->user_holidays as $userHoliday): ?>
             <tr>
                 <td><?= $this->Number->format($userHoliday->id) ?></td>
                 <td><?= $this->Number->format($userHoliday->user_id) ?></td>
                 <td><?= h($userHoliday->start_date) ?></td>
                 <td><?= h($userHoliday->end_date) ?></td>
                 <td><?= $this->Number->format($userHoliday->days_taken) ?></td>
                 <td><?= h($userHoliday->status) ?></td>

                 <td class="actions">
                     <?= $this->Html->link(__('View'), ['controller' => 'UserHolidays', 'action' => 'view', $userHoliday->id]) ?>
                     <?= $this->Html->link(__('Edit'), ['controller' => 'UserHolidays', 'action' => 'edit', $userHoliday->id]) ?>
                     <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserHolidays', 'action' => 'delete', $userHoliday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHoliday->id)]) ?>
                     <?php if($admin): ?>
                       <?= $this->Html->link(__('Approve'), ['controller' => 'UserHolidays', 'action' => 'changeStatusCompleted', $userHoliday->id], ['confirm' => __('Are you sure you want to Approve # {0}?', $userHoliday->id)]) ?>
                       <?= $this->Html->link(__('Reject'), ['controller' => 'UserHolidays', 'action' => 'RejectedUserHolidays', $userHoliday->id], ['confirm' => __('Are you want to Reject # {0}?', $userHoliday->id)]) ?>
                     <?php endif; ?>
                 </td>
             </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
     <div class="paginator">
         <ul class="pagination">
             <?= $this->Paginator->first('<< ' . __('first')) ?>
             <?= $this->Paginator->prev('< ' . __('previous')) ?>
             <?= $this->Paginator->numbers() ?>
             <?= $this->Paginator->next(__('next') . ' >') ?>
             <?= $this->Paginator->last(__('last') . ' >>') ?>
         </ul>
         <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
     </div>



 <!-- Rejected Holidays -->

 <nav class="large-3 medium-4 columns" id="actions-sidebar">
     <ul class="side-nav">
         <li class="heading"><?= __('Actions') ?></li>
         <li><?= $this->Html->link(__('List User Holidays'), ['action' => 'index']) ?></li>
          <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/approved-user-holidays"; ?>">Approved</a></li>
           <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/pending-user-holidays"; ?>">Pending</a></li>
     </ul>
 </nav>
 <div class="userHolidays form large-9 medium-8 columns content">

   <h3><?= __('Rejected Holidays') ?></h3>
   <table cellpadding="0" cellspacing="0">
       <thead>
           <tr>
               <th scope="col"><?= $this->Paginator->sort('Field') ?></th>
               <th scope="col"><?= $this->Paginator->sort('Details') ?></th>
           </tr>
       </thead>
       <tbody>
           <tr>
               <td>Name:</td>
               <td><?= h($user_details->name) ?></td>
           <tr>
           <tr>
               <td>Email:</td>
               <td><?= h($user_details->userEmail) ?></td>
           </tr>
           <tr>
               <td>Start Date:</td>
               <td><?= h($user_details->startDate) ?></td>
           </tr>
           <tr>
               <td>End Date:</td>
               <td><?= h($user_details->endDate) ?></td>
           </tr>
       </tbody>
   </table>


     <?= $this->Form->create('UserHolidays', ['url' => ['controller' => 'UserHolidays', 'action' => 'changeStatusRejected', $user_details->id]]) ?>
     <fieldset>
         <legend><?= __('notes') ?></legend>
         <?php
             echo $this->Form->textarea('notes');
         ?>
     </fieldset>



     <?= $this->Form->button(__('Submit')) ?>
     <?= $this->Form->end() ?>
 </div>




<!-- Approved Holidays -->

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Holidays'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Holiday'), ['action' => 'add']) ?></li>
        <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/pending-user-holidays"; ?>">Pending</a></li>
    </ul>
</nav>
<div class="userHolidays index large-9 medium-8 columns content">
  <h3><?= __('Days Available') ?></h3>
  <?= $this->Number->format($user->available_days) ?>

  <br>
  <br>

    <h3><?= __('Approved Holidays') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('days_taken') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user->user_holidays as $userHoliday): ?>
            <tr>
                <td><?= $this->Number->format($userHoliday->id) ?></td>
                <td><?= $this->Number->format($userHoliday->user_id) ?></td>
                <td><?= h($userHoliday->start_date) ?></td>
                <td><?= h($userHoliday->end_date) ?></td>
                <td><?= $this->Number->format($userHoliday->days_taken) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserHolidays', 'action' => 'view', $userHoliday->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserHolidays', 'action' => 'edit', $userHoliday->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserHolidays', 'action' => 'delete', $userHoliday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHoliday->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>



<!-- Pending Timesheets -->

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Timesheet'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/approved-user-timesheets"; ?>">Approved User Timesheets</a></li>
    </ul>
</nav>
<div class="userTimesheets index large-9 medium-8 columns content">
    <h3><?= __('Pending User Timesheets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration (Minutes)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user->user_timesheets as $userTimesheet): ?>
            <tr>
                <td><?= $this->Number->format($userTimesheet->id) ?></td>
                <td><?= $this->Number->format($userTimesheet->user_id) ?></td>
                <td><?= h($userTimesheet->start_date) ?></td>
                <td><?= h($userTimesheet->start_time) ?></td>
                <td><?= h($userTimesheet->end_time) ?></td>
                <td><?= $this->Number->format($userTimesheet->duration) ?></td>
                <td><?= h($userTimesheet->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTimesheets', 'action' => 'view', $userTimesheet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTimesheets', 'action' => 'edit', $userTimesheet->id]) ?>
                    <?= $this->Html->link(__('Delete'), ['controller' => 'UserTimesheets', 'action' => 'delete', $userTimesheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheet->id)]) ?>
                    <?php if($admin) : ?>
                    <?= $this->Html->link(__('Approve'), ['controller' => 'UserTimesheets','action' => 'changeStatusCompleted', $userTimesheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheet->id)]) ?>
                  <?php endif ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<!-- Rejected Timesheets -->

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Timesheet'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/approved-user-timesheets"; ?>">Approved User Timesheets</a></li>
    </ul>
</nav>
<div class="userTimesheets index large-9 medium-8 columns content">
    <h3><?= __('Rejected Times') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration (Minutes)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user->user_timesheets as $userTimesheet): ?>
            <tr>
                <td><?= $this->Number->format($userTimesheet->id) ?></td>
                <td><?= $this->Number->format($userTimesheet->user_id) ?></td>
                <td><?= h($userTimesheet->start_date) ?></td>
                <td><?= h($userTimesheet->start_time) ?></td>
                <td><?= h($userTimesheet->end_time) ?></td>
                <td><?= $this->Number->format($userTimesheet->duration) ?></td>
                <td><?= h($userTimesheet->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTimesheets', 'action' => 'view', $userTimesheet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTimesheets', 'action' => 'edit', $userTimesheet->id]) ?>
                    <?= $this->Html->link(__('Delete'), ['controller' => 'UserTimesheets', 'action' => 'delete', $userTimesheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheet->id)]) ?>
                    <?php if($admin) : ?>
                    <?= $this->Html->link(__('Approve'), ['controller' => 'UserTimesheets', 'action' => 'changeStatusCompleted', $userTimesheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheet->id)]) ?>
                  <?php endif ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>


<!-- Approved Timesheets -->

<?php if($user->admin): ?>

  <h3><?= __('Calendar') ?></h3>
  <table cellpadding="0" cellspacing="0">
      <thead>
          <tr>
              <th scope="col"><?= $this->Paginator->sort('Total') ?></th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td><a href="http://localhost/bootstrap-calendar-master/bootstrap-calendar-master/convertData.php?id=<?= $this->Number->format($user->id) ?>">View Calendar</a></td>
          </tr>
      </tbody>
  </table>

<?php endif ?>
