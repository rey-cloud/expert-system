<h1 class="text-center text-4xl text-[#003568] dark:text-[#febd5b] cursor-default font-extrabold mb-10"
  id="feedback-sent">Contact Us</h1>
<div
  class="w-full h-auto m-auto flex flex-wrap border-2 border-blue-950 border-opacity-20 rounded-xl p-10 shadow-2xl bg-[#f8f8f8] dark:bg-[#cccccb]">
  <div class="md:w-1/2 w-full mb-5 md:mb-0 h-auto flex flex-wrap">
    <iframe class="w-full h-full border-2 border-[#003568] dark:border-[#f2f2f2]"
      src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=sti davao&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
  </div>
  <div class="md:w-1/2 w-full md:p-10 p-0">
    <h1 class="text-center text-2xl font-bold text-[#003568] dark:text-[#414455] cursor-default mb-5">Give Us Your
      Feedbacks</h1>
    <form action="query/contact-message.php" method="POST">
      <input
        class="w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-3 m-auto"
        type="text" name="contact_name" placeholder="Enter your name" required>
      <input
        class="w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-3 m-auto"
        type="email" name="contact_email" placeholder="Enter your email" required>
      <textarea
        class="w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 resize-y transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-3 m-auto"
        name="message" cols="30" rows="10" style="resize: vertical;" placeholder="Enter your message"
        required></textarea>
      <div class="flex justify-center items-center" id="email-sent">
        <button
          class="hover:border-[#876128] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl hover:bg-[#febd5b] bg-[#5495C9] font-semibold text-white border-[#2e5679] hover:text-[#002951] transition duration-300 ease-in-out block dark:hidden"
          type="submit">
          Submit
        </button>
        <button
          class="border-[#876128] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl bg-[#febd5b] hover:bg-[#5495C9] font-semibold hover:text-white hover:border-[#2e5679] text-[#002951] transition duration-300 ease-in-out hidden dark:block"
          type="submit">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>

<div class="grid lg:grid-cols-2 grid-cols-1 mt-32">
  <div class="mb-5 lg:mb-0">
    <h1 class="text-3xl font-bold text-[#003568] dark:text-white cursor-default mb-5 text-center lg:text-start">Sign
      up
      for
      newsletter!</h1>
    <p class="text-[#004e94] text-base text-justify lg:text-start dark:text-gray-100">Get notified for future updates.
      Our privacy policy ensures that your information is secure and will not be shared with third parties.</p>
  </div>
  <form action="query/newsletter-email.php" method="POST" class="flex lg:px-5 px-0">
    <input type="email"
      class="w-full m-auto py-2 pl-3 rounded-l-md border-2 border-gray-300 focus:border-[#003568] focus:ring-[#dba047] focus:text-[#004e94] focus:bg-white outline-none"
      placeholder="Enter email here" name="newsletter_email" required>
    <button
      class="m-auto px-3 py-2 hover:bg-[#febd5b] bg-[#5495C9] font-semibold text-white border-[#2e5679] border-2 hover:border-[#876128] hover:text-[#002951] transition duration-300 ease-in-out rounded-r-md dark:hidden block "
      type="submit">Send</button>
    <button
      class="m-auto px-3 py-2 bg-[#febd5b] hover:bg-[#5495C9] font-semibold hover:text-white hover:border-[#2e5679] border-2 border-[#876128] text-[#002951] transition duration-300 ease-in-out rounded-r-md dark:block hidden"
      type="submit">Send</button>
  </form>
</div>