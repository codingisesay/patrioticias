<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /**
         * =========================================================
         * examtype (NEW)
         * =========================================================
         */
        Schema::create('examtype', function (Blueprint $t) {
            $t->bigIncrements('ExamTypeId');
            $t->string('ExamTypeName', 191)->unique('uq_examtype_name');
            $t->timestamps();

            $t->index('ExamTypeName', 'ix_examtype_name');
        });

        /**
         * =========================================================
         * coursetype (ONLY CHANGE: add ExamTypeId FK)
         * =========================================================
         */
        Schema::create('coursetype', function (Blueprint $t) {
            $t->bigIncrements('CourseTypeId');
            $t->string('CourseTypeName', 191);
            $t->unsignedBigInteger('ExamTypeId')->nullable();
            $t->timestamps();

            $t->index('CourseTypeName', 'ix_ct_name');
            $t->index('ExamTypeId', 'ix_ct_exam');

            $t->foreign('ExamTypeId', 'fk_ct_exam')
                ->references('ExamTypeId')->on('examtype')
                ->nullOnDelete();
        });

        /**
         * =========================================================
         * coursesubtype
         * =========================================================
         */
        Schema::create('coursesubtype', function (Blueprint $t) {
            $t->bigIncrements('CourseSubTypeId');
            $t->string('CourseSubTypeName', 191);
            $t->unsignedBigInteger('CourseTypeId');
            $t->timestamps();

            $t->index('CourseTypeId', 'ix_cst_ct');
            $t->index('CourseSubTypeName', 'ix_cst_name');
            $t->unique(['CourseTypeId', 'CourseSubTypeName'], 'uq_cst_ct_name');

            $t->foreign('CourseTypeId', 'fk_cst_ct')
                ->references('CourseTypeId')->on('coursetype');
        });

        /**
         * =========================================================
         * course
         * =========================================================
         */
        Schema::create('course', function (Blueprint $t) {
            $t->bigIncrements('CourseId');
            $t->unsignedBigInteger('CourseTypeId');
            $t->unsignedBigInteger('CourseSubTypeId');

            $t->enum('CourseMedium', ['Hindi', 'English', 'English+Hindi']);
            $t->string('CourseName', 191);

            $t->enum('Fee', ['0','1']);
            $t->string('FeeAmount', 50);

            $t->year('BaseYear');
            $t->year('TargetYear');

            $t->enum('LiveChannel', ['0','1']);
            $t->enum('LiveChat', ['0','1']);

            $t->date('CourseStartDate');
            $t->date('CourseEndDate')->nullable();

            $t->enum('CourseStatus', ['0','1']);

            $t->timestamps();

            $t->index('CourseTypeId', 'ix_course_ct');
            $t->index('CourseSubTypeId', 'ix_course_cst');
            $t->index('CourseName', 'ix_course_name');
            $t->index(['CourseStatus', 'Fee'], 'ix_course_sf');
            $t->index(['CourseStartDate', 'CourseEndDate'], 'ix_course_dates');

            $t->foreign('CourseTypeId', 'fk_course_ct')
                ->references('CourseTypeId')->on('coursetype');

            $t->foreign('CourseSubTypeId', 'fk_course_cst')
                ->references('CourseSubTypeId')->on('coursesubtype');
        });

        /**
         * =========================================================
         * courseboundling
         * =========================================================
         */
        Schema::create('courseboundling', function (Blueprint $t) {
            $t->bigIncrements('CourseBoundlingId');
            $t->unsignedBigInteger('BoundleCourse');
            $t->unsignedBigInteger('BoundleCourseWith');

            // kept from old schema (who bundled)
            $t->unsignedBigInteger('InsertBy')->nullable();

            $t->timestamps();

            $t->index('BoundleCourse', 'ix_cb_course');
            $t->index('BoundleCourseWith', 'ix_cb_with');
            $t->unique(['BoundleCourse', 'BoundleCourseWith'], 'uq_cb_pair');

            $t->foreign('BoundleCourse', 'fk_cb_course')
                ->references('CourseId')->on('course');

            $t->foreign('BoundleCourseWith', 'fk_cb_with')
                ->references('CourseId')->on('course');
        });

        /**
         * =========================================================
         * subjects
         * =========================================================
         */
        Schema::create('subjects', function (Blueprint $t) {
            $t->bigIncrements('SubjectId');
            $t->string('SubjectName', 191);
            $t->timestamps();

            $t->index('SubjectName', 'ix_subject_name');
        });

        /**
         * =========================================================
         * lecture
         * =========================================================
         */
        Schema::create('lecture', function (Blueprint $t) {
            $t->bigIncrements('LectureId');
            $t->unsignedBigInteger('CourseId');
            $t->unsignedBigInteger('SubjectId');

            $t->string('SubjectLocalName', 191);
            $t->dateTime('LectureStartTime');
            $t->dateTime('LectureEndTime');

            // faculty = user id
            $t->unsignedBigInteger('Faculty')->nullable();

            $t->text('VideoEmbedCode');
            $t->text('Synopsis');
            $t->timestamps();

            $t->index('CourseId', 'ix_lec_course');
            $t->index('SubjectId', 'ix_lec_sub');
            $t->index(['CourseId','LectureStartTime'], 'ix_lec_course_start');
            $t->index('Faculty', 'ix_lec_faculty');

            $t->foreign('CourseId', 'fk_lec_course')
                ->references('CourseId')->on('course');

            $t->foreign('SubjectId', 'fk_lec_sub')
                ->references('SubjectId')->on('subjects');

            // Faculty references users (optional)
            $t->foreign('Faculty', 'fk_lec_faculty')
                ->references('id')->on('users')
                ->nullOnDelete();
        });

        /**
         * =========================================================
         * lecturehandout
         * =========================================================
         */
        Schema::create('lecturehandout', function (Blueprint $t) {
            $t->bigIncrements('HandoutId');
            $t->unsignedBigInteger('LectureId');
            $t->string('HandoutName', 191);
            $t->string('HandoutLink', 191);
            $t->timestamps();

            $t->index('LectureId', 'ix_lh_lec');
            $t->index('HandoutName', 'ix_lh_name');

            $t->foreign('LectureId', 'fk_lh_lec')
                ->references('LectureId')->on('lecture');
        });

        /**
         * =========================================================
         * objectivequestion
         * =========================================================
         */
        Schema::create('objectivequestion', function (Blueprint $t) {
            $t->bigIncrements('ObjectiveQuestionId');
            $t->text('ObjQuestionText');
            $t->text('Option_A');
            $t->text('Option_B');
            $t->text('Option_C');
            $t->text('Option_D');
            $t->enum('CorrectAnswer', ['A','B','C','D']);
            $t->text('explanation');

            // insertedBy = users.id
            $t->unsignedBigInteger('insertedBy')->nullable();

            $t->timestamps();

            $t->index('CorrectAnswer', 'ix_oq_ans');
            $t->index('insertedBy', 'ix_oq_by');

            $t->foreign('insertedBy', 'fk_oq_by')
                ->references('id')->on('users')
                ->nullOnDelete();
        });

        /**
         * =========================================================
         * subjectivequestion
         * =========================================================
         */
        Schema::create('subjectivequestion', function (Blueprint $t) {
            $t->bigIncrements('SubjectiveQuestionId');
            $t->text('SubQuestionText');
            $t->text('explanation');

            // insertedBy = users.id
            $t->unsignedBigInteger('insertedBy')->nullable();

            $t->timestamps();

            $t->index('insertedBy', 'ix_sq_by');

            $t->foreign('insertedBy', 'fk_sq_by')
                ->references('id')->on('users')
                ->nullOnDelete();
        });

        /**
         * =========================================================
         * naturesubjectivequestion
         * =========================================================
         */
        Schema::create('naturesubjectivequestion', function (Blueprint $t) {
            $t->bigIncrements('NatureSubjectiveQuestionId');
            $t->string('Name', 191);
            $t->timestamps();

            $t->index('Name', 'ix_nsq_name');
        });

        /**
         * =========================================================
         * lectureobjectivequestion
         * =========================================================
         */
        Schema::create('lectureobjectivequestion', function (Blueprint $t) {
            $t->bigIncrements('LectureObjectiveQuestionId');
            $t->unsignedBigInteger('ObjectiveQuestionId');
            $t->unsignedBigInteger('LectureId');
            $t->string('Marks', 50);

            // insertedBy = users.id
            $t->unsignedBigInteger('insertedBy')->nullable();

            $t->timestamps();

            $t->index('ObjectiveQuestionId', 'ix_loq_q');
            $t->index('LectureId', 'ix_loq_lec');
            $t->index('insertedBy', 'ix_loq_by');

            $t->unique(['ObjectiveQuestionId', 'LectureId'], 'uq_loq_pair');

            $t->foreign('ObjectiveQuestionId', 'fk_loq_q')
                ->references('ObjectiveQuestionId')->on('objectivequestion');

            $t->foreign('LectureId', 'fk_loq_lec')
                ->references('LectureId')->on('lecture');

            $t->foreign('insertedBy', 'fk_loq_by')
                ->references('id')->on('users')
                ->nullOnDelete();
        });

        /**
         * =========================================================
         * lecturesubjectivequestion
         * =========================================================
         */
        Schema::create('lecturesubjectivequestion', function (Blueprint $t) {
            $t->bigIncrements('LectureSubjectiveQuestionId');
            $t->unsignedBigInteger('SubjectiveQuestionId');
            $t->unsignedBigInteger('LectureId');
            $t->unsignedBigInteger('NatureSubjectiveQuestionId');
            $t->string('Marks', 50);
            $t->string('WordLimit', 50);

            // insertBy = users.id
            $t->unsignedBigInteger('insertBy')->nullable();

            $t->timestamps();

            $t->index('SubjectiveQuestionId', 'ix_lsq_q');
            $t->index('LectureId', 'ix_lsq_lec');
            $t->index('NatureSubjectiveQuestionId', 'ix_lsq_nat');
            $t->index('insertBy', 'ix_lsq_by');

            $t->unique(
                ['SubjectiveQuestionId', 'LectureId', 'NatureSubjectiveQuestionId'],
                'uq_lsq_triple'
            );

            $t->foreign('SubjectiveQuestionId', 'fk_lsq_q')
                ->references('SubjectiveQuestionId')->on('subjectivequestion');

            $t->foreign('LectureId', 'fk_lsq_lec')
                ->references('LectureId')->on('lecture');

            $t->foreign('NatureSubjectiveQuestionId', 'fk_lsq_nat')
                ->references('NatureSubjectiveQuestionId')->on('naturesubjectivequestion');

            $t->foreign('insertBy', 'fk_lsq_by')
                ->references('id')->on('users')
                ->nullOnDelete();
        });

        /**
         * =========================================================
         * liveandlatestsessionvideo
         * =========================================================
         */
        Schema::create('liveandlatestsessionvideo', function (Blueprint $t) {
            $t->bigIncrements('VideoId');
            $t->string('VideoEmbedCodeEnglish', 191);
            $t->string('VideoEmbedCodeHindi', 191);

            // InsertBy = users.id
            $t->unsignedBigInteger('InsertBy')->nullable();

            $t->timestamps();

            $t->index('InsertBy', 'ix_llsv_by');

            $t->foreign('InsertBy', 'fk_llsv_by')
                ->references('id')->on('users')
                ->nullOnDelete();
        });

        /**
         * =========================================================
         * livechannelembedcode
         * =========================================================
         */
        Schema::create('livechannelembedcode', function (Blueprint $t) {
            $t->bigIncrements('LiveChannelEmbedCodeId');
            $t->string('LiveChannelEmbedCodeLink', 191);
            $t->unsignedBigInteger('CourseId');
            $t->timestamps();

            $t->index('CourseId', 'ix_lcec_course');

            $t->foreign('CourseId', 'fk_lcec_course')
                ->references('CourseId')->on('course');
        });

        /**
         * =========================================================
         * mainstestpaper
         * =========================================================
         */
        Schema::create('mainstestpaper', function (Blueprint $t) {
            $t->bigIncrements('MainsTestPaperId');
            $t->unsignedBigInteger('SubjectId');
            $t->string('SubjectLocalName', 191);
            $t->unsignedBigInteger('CourseId');
            $t->timestamps();

            $t->index('SubjectId', 'ix_mtp_sub');
            $t->index('CourseId', 'ix_mtp_course');
            $t->index(['CourseId','SubjectId'], 'ix_mtp_course_sub');

            $t->foreign('SubjectId', 'fk_mtp_sub')
                ->references('SubjectId')->on('subjects');

            $t->foreign('CourseId', 'fk_mtp_course')
                ->references('CourseId')->on('course');
        });

        /**
         * =========================================================
         * mainstestpaperquestion
         * =========================================================
         */
        Schema::create('mainstestpaperquestion', function (Blueprint $t) {
            $t->bigIncrements('MainsTestPaperQuestion');
            $t->unsignedBigInteger('SubjectiveQuestionId');
            $t->unsignedBigInteger('MainsTestPaperId');
            $t->string('Marks', 50);
            $t->timestamps();

            $t->index('SubjectiveQuestionId', 'ix_mtpq_q');
            $t->index('MainsTestPaperId', 'ix_mtpq_paper');
            $t->unique(['SubjectiveQuestionId', 'MainsTestPaperId'], 'uq_mtpq_pair');

            $t->foreign('SubjectiveQuestionId', 'fk_mtpq_q')
                ->references('SubjectiveQuestionId')->on('subjectivequestion');

            $t->foreign('MainsTestPaperId', 'fk_mtpq_paper')
                ->references('MainsTestPaperId')->on('mainstestpaper');
        });

        /**
         * =========================================================
         * prelimstestpaper
         * =========================================================
         */
        Schema::create('prelimstestpaper', function (Blueprint $t) {
            $t->bigIncrements('PrelimsTestPaperId');
            $t->unsignedBigInteger('TestPaperSubjectId');
            $t->string('TestPaperLocalName', 191);
            $t->unsignedBigInteger('CourseId');
            $t->timestamps();

            $t->index('TestPaperSubjectId', 'ix_ptp_sub');
            $t->index('CourseId', 'ix_ptp_course');
            $t->index(['CourseId','TestPaperSubjectId'], 'ix_ptp_course_sub');

            $t->foreign('CourseId', 'fk_ptp_course')
                ->references('CourseId')->on('course');

            $t->foreign('TestPaperSubjectId', 'fk_ptp_sub')
                ->references('SubjectId')->on('subjects');
        });

        /**
         * =========================================================
         * prelimstestpaperquestions
         * =========================================================
         */
        Schema::create('prelimstestpaperquestions', function (Blueprint $t) {
            $t->bigIncrements('PrelimsTestPaperQuestionsId');
            $t->unsignedBigInteger('ObjectiveQuestionId');
            $t->unsignedBigInteger('PrelimsTestPaperId');
            $t->string('Marks', 50);
            $t->timestamps();

            $t->index('ObjectiveQuestionId', 'ix_ptpq_q');
            $t->index('PrelimsTestPaperId', 'ix_ptpq_paper');
            $t->unique(['ObjectiveQuestionId', 'PrelimsTestPaperId'], 'uq_ptpq_pair');

            $t->foreign('ObjectiveQuestionId', 'fk_ptpq_q')
                ->references('ObjectiveQuestionId')->on('objectivequestion');

            $t->foreign('PrelimsTestPaperId', 'fk_ptpq_paper')
                ->references('PrelimsTestPaperId')->on('prelimstestpaper');
        });

        /**
         * =========================================================
         * studentassigncourse  (NOW USING users table)
         * =========================================================
         */
        Schema::create('studentassigncourse', function (Blueprint $t) {
            $t->bigIncrements('StudentAssignCourseId');

            // StudentId => users.id
            $t->unsignedBigInteger('StudentId');

            $t->unsignedBigInteger('CourseId');
            $t->enum('status', ['0','1'])->default('0');
            $t->enum('mode', ['0','1']);

            // InsertBy => users.id (admin)
            $t->unsignedBigInteger('InsertBy')->nullable();

            $t->timestamps();

            $t->index('StudentId', 'ix_sac_student');
            $t->index('CourseId', 'ix_sac_course');
            $t->index('status', 'ix_sac_status');
            $t->unique(['StudentId', 'CourseId'], 'uq_sac_pair');

            $t->foreign('StudentId', 'fk_sac_student')
                ->references('id')->on('users')
                ->cascadeOnDelete();

            $t->foreign('CourseId', 'fk_sac_course')
                ->references('CourseId')->on('course');

            $t->foreign('InsertBy', 'fk_sac_by')
                ->references('id')->on('users')
                ->nullOnDelete();
        });

        /**
         * =========================================================
         * counselling_student (NOW USING users)
         * =========================================================
         */
        Schema::create('counselling_student', function (Blueprint $t) {
            $t->bigIncrements('id');

            $t->unsignedBigInteger('course_id');

            // student user
            $t->unsignedBigInteger('user_id')->nullable();

            $t->string('enq_per_name', 191);
            $t->string('enq_per_email', 191);
            $t->string('enq_per_phone', 50);
            $t->text('enq_per_msg');

            $t->enum('counselling_status', ['0','1']);
            $t->text('counselling_comment')->nullable();

            // admin user
            $t->unsignedBigInteger('counselling_done_by')->nullable();

            $t->dateTime('counsellingDateTime')->nullable();
            $t->timestamps();

            $t->index('course_id', 'ix_cs_course');
            $t->index('user_id', 'ix_cs_user');
            $t->index('enq_per_phone', 'ix_cs_phone');
            $t->index('counselling_status', 'ix_cs_status');

            $t->foreign('course_id', 'fk_cs_course')
                ->references('CourseId')->on('course')
                ->cascadeOnDelete();

            $t->foreign('user_id', 'fk_cs_user')
                ->references('id')->on('users')
                ->nullOnDelete();

            $t->foreign('counselling_done_by', 'fk_cs_by')
                ->references('id')->on('users')
                ->nullOnDelete();
        });

        /**
         * =========================================================
         * tests (TestId NOT auto inc)
         * =========================================================
         */
        Schema::create('tests', function (Blueprint $t) {
            $t->bigInteger('TestId');
            $t->string('TestName', 191);
            $t->text('TestDescription')->nullable();
            $t->timestamps();

            $t->primary('TestId');
            $t->index('TestName', 'ix_tests_name');
        });

        /**
         * =========================================================
         * testresults (NOW USING users)
         * =========================================================
         */
        Schema::create('testresults', function (Blueprint $t) {
            $t->bigIncrements('TestResultId');

            // StudentId => users.id
            $t->unsignedBigInteger('user_id');

            $t->unsignedBigInteger('TestId');
            $t->unsignedBigInteger('QuestionId');

            $t->char('UserAnswer', 1);
            $t->boolean('IsCorrect');
            $t->timestamps();

            $t->index('user_id', 'ix_tr_student');
            $t->index('TestId', 'ix_tr_test');
            $t->index('QuestionId', 'ix_tr_q');
            $t->index('IsCorrect', 'ix_tr_correct');

            $t->foreign('user_id', 'fk_tr_student')
                ->references('id')->on('users')
                ->cascadeOnDelete();
        });

        /**
         * =========================================================
         * topperstalk (id NOT auto inc)
         * =========================================================
         */
        Schema::create('topperstalk', function (Blueprint $t) {
            $t->bigInteger('id');
            $t->string('heading', 191);
            $t->text('title');
            $t->string('publicDate', 50);
            $t->string('videoLink', 191);
            $t->string('imageLink', 191);
            $t->text('description');
            $t->timestamps();

            $t->primary('id');
            $t->index('publicDate', 'ix_tt_date');
        });

        /**
         * =========================================================
         * OPTIONAL: If you still want course_student pivot table,
         * keep it, but it should also reference users.
         * (If you don't use it, remove this whole table.)
         * =========================================================
         */
        Schema::create('course_student', function (Blueprint $t) {
            $t->increments('id');
            $t->unsignedBigInteger('course_id');
            $t->unsignedBigInteger('user_id'); // users.id
            $t->tinyInteger('status');
            $t->timestamps();

            $t->index('course_id', 'ix_cs_course');
            $t->index('user_id', 'ix_cs_student');
            $t->index('status', 'ix_cs_status');

            // No FK here since course table key is CourseId (bigint) but course_id is unsignedBigInteger: ok.
            $t->foreign('user_id', 'fk_cs_user')
                ->references('id')->on('users')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_student');
        Schema::dropIfExists('topperstalk');
        Schema::dropIfExists('testresults');
        Schema::dropIfExists('tests');
        Schema::dropIfExists('counselling_student');
        Schema::dropIfExists('studentassigncourse');
        Schema::dropIfExists('prelimstestpaperquestions');
        Schema::dropIfExists('prelimstestpaper');
        Schema::dropIfExists('mainstestpaperquestion');
        Schema::dropIfExists('mainstestpaper');
        Schema::dropIfExists('livechannelembedcode');
        Schema::dropIfExists('liveandlatestsessionvideo');
        Schema::dropIfExists('lecturesubjectivequestion');
        Schema::dropIfExists('lectureobjectivequestion');
        Schema::dropIfExists('naturesubjectivequestion');
        Schema::dropIfExists('subjectivequestion');
        Schema::dropIfExists('objectivequestion');
        Schema::dropIfExists('lecturehandout');
        Schema::dropIfExists('lecture');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('courseboundling');
        Schema::dropIfExists('course');
        Schema::dropIfExists('coursesubtype');
        Schema::dropIfExists('coursetype');
        Schema::dropIfExists('examtype');
    }
};
