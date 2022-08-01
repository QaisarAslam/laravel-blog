<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
	{
		$this->call(UserSeeder::class);
		$this->call(TagSeeder::class);
		$this->call(CategorySeeder::class);
		$this->call(RoleSeeder::class);
		$this->call(CmsSeeder::class);
		// $this->call(BlogSeeder::class);
		/*DB::table('users')->insert([
			"name"=> "Prof. Jovan Ritchie",
			"email"=> "keith.wilderman@sporer.com",
			'password'=> "secret",
			"created_at"=> "2020-01-22 02:13:53",
			"updated_at"=> "2020-01-22 02:13:53"
		]);*/
		DB::table('role_user')->insert([
				[
					'role_id' => '1',
					'user_id' => '1',
				],
								[
					'role_id' => '1',
					'user_id' => '2',
				],
								[
					'role_id' => '2',
					'user_id' => '3',
				],
								[
					'role_id' => '2',
					'user_id' => '4',
				],
								[
					'role_id' => '2',
					'user_id' => '5',
				],
								[
					'role_id' => '2',
					'user_id' => '6',
				],
		]);
		DB::table('blogs')->insert([
				/*Start Here
					[
						'user_id'           => '1',
						'category_id'       => '1',
						// 'title'          => '1st User 1st Blog category_id => 1',
						'title'             => '1st Blog',
						'url'               => '1st_id_1st_url',
						'image'             => 'blog1.jpg',
						'image_alt'         => 'blog1_alt',
						'meta'              => '1st blog 1st id meta',
						'short_description' => '500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'description'       => '1st 500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'active'            => '1',
						"created_at" => "2021-05-21 15:10:39",
						"updated_at" => "2020-08-07 20:06:39",
					],
					[
						'user_id'           => '1',
						'category_id'       => '2',
						// 'title'          => '1st User 2nd Blog category_id => 2',
						'title'             => '2nd Blog',
						'url'               => '1st_id_2nd_url',
						'image'             => 'blog2.jpg',
						'image_alt'         => 'blog2_alt',
						'meta'              => '2nd blog 1st id meta',
						'short_description' => '500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'description'       => '2nd 500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'active'            => '1',
						"created_at" => "2020-09-29 23:52:35",
						"updated_at" => "2021-07-25 10:09:06",
					],
					[
						'user_id'           => '2',
						'category_id'       => '3',
						// 'title'          => '2nd User 1st Blog category_id => 3',
						'title'             => '1st Blog',
						'url'               => '2nd_id_1st_url',
						'image'             => 'blog3.jpg',
						'image_alt'         => 'blog3_alt',
						'meta'              => '1st blog 2nd id meta',
						'short_description' => '500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'description'       => '3rd 500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'active'            => '1',
						"created_at" => "2021-01-30 13:51:00",
						"updated_at" => "2020-12-04 00:45:25",
					],
					[
						'user_id'           => '2',
						'category_id'       => '4',
						// 'title'          => '2nd User 2nd Blog category_id => 4',
						'title'             => '2nd Blog',
						'url'               => '2nd_id_2nd_url',
						'image'             => 'blog4.jpg',
						'image_alt'         => 'blog4_alt',
						'meta'              => '2nd blog 2nd id meta',
						'short_description' => '500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'description'       => '4th 500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'active'            => '1',
						"created_at" => "2021-01-24 21:02:13",
						"updated_at" => "2021-05-28 17:03:18",
					],
					[
						'user_id'           => '3',
						'category_id'       => '3',
						// 'title'          => '3rd User 1st Blog category_id => 3',
						'title'             => '1st Blog',
						'url'               => '3rd_id_1st_url',
						'image'             => 'blog5.jpg',
						'image_alt'         => 'blog5_alt',
						'meta'              => '1st blog 3rd id meta',
						'short_description' => '500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'description'       => '5th 500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'active'            => '1',
						"created_at" => "2021-01-07 08:32:34",
						"updated_at" => "2021-07-01 09:35:27",
					],
					[
						'user_id'           => '3',
						'category_id'       => '3',
						// 'title'          => '3rd User 2nd Blog category_id => 3',
						'title'             => '2nd Blog',
						'url'               => '3rd_id_2nd_url',
						'image'             => 'blog6.jpg',
						'image_alt'         => 'blog6_alt',
						'meta'              => '2nd blog 3rd id meta',
						'short_description' => '4th 500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'description'       => '6th 500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'active'            => '1',
						"created_at" => "2020-11-29 01:32:40",
						"updated_at" => "2021-06-19 20:05:09",
					],
					[
						'user_id'           => '4',
						'category_id'       => '4',
						// 'title'          => '4th User 1st Blog category_id => 4',
						'title'             => '1st Blog',
						'url'               => '4th_id_1st_url',
						'image'             => 'blog7.jpg',
						'image_alt'         => 'blog7_alt',
						'meta'              => '1st blog 4th id meta',
						'short_description' => '500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'description'       => '7th 5th 500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'active'            => '0',
						"created_at" => "2021-07-17 06:12:19",
						"updated_at" => "2021-03-14 16:06:17",
					],
					[
						'user_id'           => '4',
						'category_id'       => '4',
						// 'title'          => '4th User 2nd Blog category_id => 4',
						'title'             => '2nd Blog',
						'url'               => '4th_id_2nd_url',
						'image'             => 'blog8.jpg',
						'image_alt'         => 'blog8_alt',
						'meta'              => '2nd blog 4th id meta',
						'short_description' => '500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'description'       => '8th 500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.500 CharactersLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.',
						'active'            => '0',
						"created_at" => "2021-08-14 14:20:35",
						"updated_at" => "2020-08-01 21:15:22",
					],
				End Here*/
				[
					'user_id'           =>'1',
					'category_id'       =>'1',
					'title'             =>'<h2>How to become the most recognizable company in your industry</h2>',
					'url'               =>'how-to-become-the-most-recognizable-company-in-your-industry',
					'image'             =>'friends-business.jpeg',
					'image_alt'         =>'Friends-Business',
					'meta'              =>'Don’t be afraid to have a personality.',
					'short_description' =>'The ultimate aim of any business is to become the ‘go-to’ organization in its industry, creating such rock-solid brand positioning that customers are already sold on your business before you’ve even offered them a product or service.',
					'description'       =>'The most important piece of advice to remember when trying to become the most recognizable company in your industry is to get inside your prospect’s heads.
											Presumably, you already have a firm belief that your products or services are the best on the market, but all that’s stopping you from becoming the number-one brand is customer perception. Therefore, this is not simply a matter of undercutting your competitors on price, product quality, or the number of freebies you throw in.
											Instead, it is a psychological shift that needs to happen within your customer’s minds. To help make this happen, you will have to be bold. Your branding will have to become indelibly linked with your industry, a by-word for quality and expertise.
											A great way of positioning yourself as the most recognizable brand is simple – become more recognizable. Make your branding clear and distinctive, and go one step further by circulating a range of high-quality merchandise that your market will want to use daily.
											Merchandise, such as promotional wristbands, will help your brand sink into people’s minds, reminding them with every sip of coffee, walk in the rain, or any other daily experience your merch helps with that your company exists.
											When the time comes, and they need to buy from your market, they will recognize your brand above all others.',
					'active'	     	=>'1',
					"created_at" 		=>"2021-05-21 15:10:39",
					"updated_at" 		=>"2020-08-07 20:06:39",
				],
				[
					'user_id'           =>'1',
					'category_id'       =>'2',
					'title'             =>'<h2>5 Natural ways to overcome depression</h2>',
					'url'               =>'5-natural-ways-to-overcome-depression',
					'image'             =>'depression.jpeg',
					'image_alt'         =>'Depression',
					'meta'              =>'The best way to stop your mind from dwelling on negative thoughts is to work hard and remain productive throughout the day.',
					'short_description' =>'In developed or less-developed countries, depression is one of the main causes of disability. According to the predictions of the World Health Organization, depression is expected to become the second most prevalent disease worldwide by the year 2020.',
					'description'       =>'The common treatment for curing this problem is the use of anti-depressants but they come with a slew of side effects. Sometimes these treatments bring more health issues to your body; therefore, you must look for natural ways to improve your depression systems.',
					'active'            => '1',
					"created_at" 		=> "2020-09-29 23:52:35",
					"updated_at" 		=> "2021-07-25 10:09:06",
				],
				[
					'user_id'           =>'2',
					'category_id'       =>'3',
					'title'             =>'<h2>Quit this ‘ONE’ bad habit to become more successful in life</h2>',
					'url'               =>'quit-this-one-bad-habit-to-become-more-successful-in-life',
					'image'             =>'jackma-habit.jpg',
					'image_alt'         =>'Jackma-Habit',
					'meta'              =>'I stopped listening to music and watching TV in my 20s. It sounds extreme, but I did it because I thought they would just distract me from thinking about software',
					'short_description' =>'Sometimes you get very tired of working really hard and it makes your mind wander. This makes you distracted from the actual work and you waste a lot of your time. The secret of overcoming this bad habit and attaining success is to value the time that you have. The secret to success is to Value Time because it is the only thing you cannot buy.',
					'description'       =>'This is absolutely right from the perspective that in order to pursue hobbies with high returns, you are required to forgo activities that have low returns. This may not sound easy initially but the good news is that you can do this innately.
											You actually have to take time out to determine the opportunity costs and gains of each and what to pursue over the other and make sure you value your time because time is money. pursuing one goal requires complete focus.
											Follow these 5 simple tweaks to your daily routine can maximize your productivity. If you take the examples of successful people like Jeff Bezos, Jack Ma, Warren Buffett, Bill Gates, and many other, you will understand that how strategically giving up some of the activities made them focus on the ones that help them become incredibly successful business champions.
											Jack Ma is officially the richest man in China now, but that did not happen overnight. It happened because Jack valued time and had a complete focus on his venture Alibaba. He valued his customers and the people who worked for him. He once said that fearless, optimistic people create the brightest future and young people need to realize that once the time is lost, will never come back. This is why while addressing younger people, he emphasized to do this when you’re 30 years old.',
					'active'            => '1',
					"created_at" 		=> "2021-01-30 13:51:00",
					"updated_at" 		=> "2020-12-04 00:45:25",
				],
				[
					'user_id'           =>'2',
					'category_id'       =>'4',
					'title'             =>'<h2>Key Benefits of E-Learning</h2>',
					'url'               =>'key-benefits-of-e-learning',
					'image'             =>'elearning-benefits.jpeg',
					'image_alt'         =>'Elearning-Benefits',
					'meta'              =>'If you run a business and you are trying to get the most of your staff members, it certainly makes sense that you put them through their paces and push them to achieve greater and greater things.',
					'short_description' =>'If you run a business and you are trying to get the most of your staff members, it certainly makes sense that you put them through their paces and push them to achieve greater and greater things. While traditional training courses still have their place to play, there are plenty of direct advantages involved in e-learning courses. Here, we are going to be taking a closer look at exactly what these are.',
					'description'       =>'Flexibility to Complete Whenever
											Traditional learning courses can end up taking a significant chunk of time out of the working day. However, this is not the case with e-learning courses which have a much higher level of flexibility to complete them whenever it suits the student. It gives you the chance to conduct the course as a group or ask your employees to complete it by a certain deadline depending on when works best for them. Also, since many workers are operating in a remote capacity, there is an even greater sense of importance in e-learning as it is the only viable solution on the table for many.
											Cost-Effective Solution
											Next up, we have the cost-effective nature of using an online e-learning platform, which can be in contrast to the more traditional counterparts. Not only do you save on travel costs, but there is also the accommodation to think about as well. Even if you were bringing somebody into the office, you tend to have to shell out a significantly higher fee.
											Reduce Your Carbon Footprint
											Many businesses are taking a more serious look at how they can reduce their carbon footprints, and one possibility is through e-learning. First of all, there is less of a need to travel, which is obviously a big one. Also, you have the simple fact that everything is done via a computer screen, and there is no need to print anything off beforehand and create waste products. The little things can add up when you are trying to reduce your impact on the environment.',
					'active'            => '1',
					"created_at" 		=> "2021-01-24 21:02:13",
					"updated_at" 		=> "2021-05-28 17:03:18",
				],
				[
					'user_id'           =>'3',
					'category_id'       =>'3',
					'title'             =>'<h2>Tech Tips for Freelance Product Designers</h2>',
					'url'               =>'tech-tips-for-freelance-product-designers',
					'image'             =>'freelance-product-designer.jpeg',
					'image_alt'         =>'Freelance-Product-Designer',
					'meta'              =>'Being a freelancer is an exciting path to go down, especially as a product designer.',
					'short_description' =>'Product designers are some of the most creative (and ambitious) individuals on the planet. Each product designer is different from the next; some specialize in household appliances, some are gifted at creating smartphone accessories, whilst others are talented at making industrial tools and machinery. Some freelance designers don’t even have specialty areas, as their skill sets cover a wide range of different industry needs!',
					'description'       =>'Organize your home office
											Most freelancers – from product designers to copywriters – work from home offices.
											This means that your home office needs to be expertly designed and organized to suit your profession: designing.
											You’ll need adequate space for planning and prototyping your products, as well as a nifty storage space for all your tools and transistor parts.
											Being organized will enable you to perform to the best of your ability, whilst also ensuring that your day-to-day operations run efficiently. After all, if your home office and workspace is a mess, your products will reflect it!
											Create prototypes
											As a freelance product designer, it’s essential that you let your creative juices run when it comes to prototyping. From the initial storyboarding process to the physical assembly of your prototype, don’t be afraid to let creativity guide you – and if you make a mistake (or several mistakes) it’s no big deal.
											Ideally, your prototype should be focused on user-friendliness, as modern consumers don’t like to be overwhelmed by complex and difficult-to-use products. Also, make sure to test your prototypes with friends, family, or volunteers to get a grasp of what’s good and what’s not. You can even post videos of your prototypes online, be it through YouTube or forum spaces where you can receive detailed feedback from fellow users.
											Another pro tip: 3D printers (if you can afford to access one) are excellent for prototyping and are very much a modern solution.',
					'active'            => '0',
					"created_at" 		=> "2021-01-07 08:32:34",
					"updated_at" 		=> "2021-07-01 09:35:27",
				],
				[
					'user_id'           =>'3',
					'category_id'       =>'3',
					'title'             =>'<h2>7 Habits of highly confident people who become the leaders</h2>',
					'url'               =>'7-habits-of-highly-confident-people-who-become-the-leaders',
					'image'             =>'rich-man.jpg',
					'image_alt'         =>'Rich-Man',
					'meta'              =>'Understand the beauty in little things',
					'short_description' =>'For a happy and successful life, self-confidence is crucial because it influences your success in leadership, the way you engage with people, and your work in general. Self-confidence influences how you are in your personal life, professional life, and even leisure activities. As stated by Henry David Thoreau; if you advance confidently in the direction of your dreams and endeavors to live the life you have imagined, you will the success unexpected in common hours.',
					'description'       =>'Positive self-talk:
											For all confident people, positive self-talk has been shown to enhance performance. A personal mental conversation with a shiny and bright attitude towards your life and yourself helps to accept reality and make it look optimistic.
											Positive comparison:
											Living in a society, the social comparison gets hardwired into everyone’s brain. As a natural process, the comparison is meant for the good of every individual to bring improvement. Therefore, all the confident successful people make positive comparisons with other successful people in order to do better in their performance. This is what you can do too and can make your life even better.
											Learning from mistakes:
											Although many people consider mistakes to be hidden but confident people don’t do that. Confident people embrace whatever mistakes they make and learn from them. This is what makes them highly successful in their life.',
					'active'            => '1',
					"created_at" 		=> "2020-11-29 01:32:40",
					"updated_at" 		=> "2021-06-19 20:05:09",
				],
				[
					'user_id'           =>'4',
					'category_id'       =>'4',
					'title'             =>'<h2>Technical skills for resume that can land you a dream job</h2>',
					'url'               =>'9-technical-skills-for-resume',
					'image'             =>'technical-skills-for-resume.jpg',
					'image_alt'         =>'Technical-Skills-for-Resume',
					'meta'              =>'The common lamentation among college students is that they are not equipped with the right kind of computer skills to put on resumes.',
					'short_description' =>'The common lamentation among college students is that they are not equipped with the right kind of computer skills to put on resumes even after their graduation to apply for a job. Especially students of the arts as their majors do not consider their education capable enough to effectively translate to the real world.',
					'description'       =>'1. Public Speaking:
											One of the most important skills you will develop in your life is Public Speaking. Your business growth and professional relationships, all depend on how you communicate publicly. If you are one of those who fear public speaking, you must learn from this handy course.
											2. Web Development:
											Web development serves as a tool for companies providing them with a podium for their web presence. It allows them to get in touch with millions of web surfers all over the world. For beginners, it is a very good place to start with.
											3. Adobe Photoshop:
											The most popular software among web designers and image editors is Adobe Photoshop. This user-friendly software offers a lot of unique tools to help you unleash your creativity. In order to learn photo editing or graphic designing, you need to have a basic knowledge of Photoshop.
											4. Foreign Language:
											Becoming bilingual is no less than a blessing. It may not be an easy task but the benefits are endless if you know more than one language. People who can speak a foreign language especially Spanish are more desirable in the eyes of the employees.
											5. SEO:
											It is the most important tool for website owners to attract traffic. It improves their search engine rankings and increases the quality of their website. Since the whole process has a number of rules and guidelines to follow, it should be considered as a framework. In today’s competitive market, it is demanded more than ever.',
					'active'            => '0',
					"created_at" 		=> "2021-07-17 06:12:19",
					"updated_at"	 	=> "2021-03-14 16:06:17",
				],
				[
					'user_id'           =>'4',
					'category_id'       =>'4',
					'title'             =>'<h2>Stop dreaming success as a freelancer if you do not possess this one ability</h2>',
					'url'               =>'learn-communication-skill-for-freelance-success',
					'image'             =>'make-money-freelancing.jpeg',
					'image_alt'         =>'Make-Money-Freelancing',
					'meta'              =>'Communication skills not only fetched new clients but also helped a long way in retaining old clients too, which I believe, is 60% of your success as a freelancer.',
					'short_description' =>'54 million Americans worked as independent contractors in 2016 and the number has substantially increased ever since. By the year 2020, 43% of the U.S workforce will be freelancing. With the average price for a good online worker, especially a software developer touching $1k, many people are encouraged to learn the technical skills and offer their services as a freelancer on different freelancer marketplaces.',
					'description'       =>'Freelancers in the U.S alone contribute 1.4 trillion to the economy every year and the worldwide stats could be well speculated based on these numbers only.
											Freelancing is freedom, the very idea of being self-employed and work from home at your own pace is unparalleled. With the growing success of being empowered by working from home and raising your efficiency, many big companies in the world are also encouraging work from the home model as it has multi-facets to maximum productivity.
											As a freelancer who has been self-employed for almost about two decades, I have observed many success and failure stories. I have seen freelancers failing and quitting who were well destined to reach the top and I have also seen Freelancers acing the game even though I tipped them off as a complete failure at the beginning of their career.
											When I started observing the freelancing patron and behavior of freelancers closely, I realized, it is not only the skill that makes you go places.
											Truth be told, skill is just one attribute, and of course, you have to be talented enough to be skillful to get a job done but freelancing is far beyond the skills-set to have, I mean — as far as tasting success is concerned.
											On a cold winter night of 2010, I was having a conversation with one of my clients on Skype who wanted to talk to me in person and see how I converse.
											His perception was, the people from Asia are usually poor people as they belong to third world countries, English is not their first language and he did not want to waste his money on hiring someone who would find it extremely hard to apprehend the project requirements and get the job done.
											Within a couple of minutes of our video call, he brought my attention to my communication skill. He was impressed, to say the least, and told me why he was skeptical to hire someone from my country amid a lack of knowing, speaking English.
											With that worry set aside, his next observation was my communication skill and in no time, I was complimented not only for my accent but also for my ability to convey ‘how I plan to get his work done, timeline, and other nitty-gritty details about the job.',
					'active'            => '0',
					"created_at" 		=> "2021-08-14 14:20:35",
					"updated_at" 		=> "2020-08-01 21:15:22",
				],
				[
					'user_id'           =>'5',
					'category_id'       =>'4',
					'title'             =>'<h2>What is 80/20 rule?</h2>',
					'url'               =>'what-is-80-20-rule',
					'image'             =>'80-20-rule-pareto-principle.jpg',
					'image_alt'         =>'80-20-Rule-Pareto-Principle',
					'meta'              =>'If you have studied business or economics, you must have been familiar with the power of the 80/20 rule, commonly known as the Pareto Principle.',
					'short_description' =>'The Man Behind The Concept:
											The man behind the entire concept of the 80/20 principle or Pareto Principle was born in 1848 in Italy. With the aim of becoming an economist and a philosopher, he noticed that 20 percent of the pea plants in his garden generated 80 percent of the healthy pea pods. This forced him to pay attention to the uneven distribution. It was revealed through his own studies that 80 percent of the land in Italy was owned by just 30 percent of the people. Upon investigating other industries he found out that 80 percent of the production typically came from just 20 percent of the companies. This gave him the idea that 80 percent of the outcomes happen just because of 20 percent of the action.',
					'description'       =>'What is the 80/20 Rule?
											Thus now the imbalance between inputs and outputs is known as the Pareto Principle or the 80/20 rule. This imbalance is often seen in business cases such as:
											Almost 20 percent of the sales reps generate 80 percent of the total sale
											Almost 20 percent of the customer’s account for 80 percent of the profit
											Around 20 percent of the software bugs cause 80 percent of the crashes
											And 20 percent of the patients account for 80 percent of the spending in healthcare
											The 80/20 rule is one of the greatest secrets of highly successful people as well as organizations. Among businesses, it is of more importance because 20 percent of the customers generate 80 percent of the actual revenue. This principle shows how you can achieve more with less effort, time, and resources. You only need to identify and focus on 20 percent of the work that actually matters.',
					'active'            =>'1',
					"created_at" 		=> "2021-01-03 16:31:56",
					"updated_at" 		=> "2021-08-21 11:19:45",
				],
		]);
		DB::table('blog_tag')->insert([
				[
					'blog_id'    => '1',
					'tag_id'     => '1',
					"created_at" => "2021-01-03 16:31:56",
					"updated_at" => "2021-08-21 11:19:45",
				],
				[
					'blog_id'    => '2',
					'tag_id'     => '2',
					"created_at" => "2021-06-17 21:24:36",
					"updated_at" => "2020-11-18 04:59:31",
				],
				[
					'blog_id'    => '3',
					'tag_id'     => '3',
					"created_at" => "2020-09-19 01:10:44",
					"updated_at" => "2021-04-19 21:30:14",
				],
				[
					'blog_id'    => '4',
					'tag_id'     => '3',
					"created_at" => "2021-04-13 07:51:50",
					"updated_at" => "2021-07-03 17:11:16",
				],
				[
					'blog_id'    => '5',
					'tag_id'     => '5',
					"created_at" => "2021-01-03 16:31:56",
					"updated_at" => "2021-08-21 11:19:45",
				],
				[
					'blog_id'    => '5',
					'tag_id'     => '6',
					"created_at" => "2021-06-17 21:24:36",
					"updated_at" => "2020-11-18 04:59:31",
				],
				[
					'blog_id'    => '6',
					'tag_id'     => '7',
					"created_at" => "2020-09-19 01:10:44",
					"updated_at" => "2021-04-19 21:30:14",
				],
				[
					'blog_id'    => '6',
					'tag_id'     => '8',
					"created_at" => "2021-04-13 07:51:50",
					"updated_at" => "2021-07-03 17:11:16",
				],
				[
					'blog_id'    => '7',
					'tag_id'     => '2',
					"created_at" => "2020-09-19 01:10:44",
					"updated_at" => "2021-04-19 21:30:14",
				],
				[
					'blog_id'    => '7',
					'tag_id'     => '3',
					"created_at" => "2021-04-13 07:51:50",
					"updated_at" => "2021-07-03 17:11:16",
				],
				[
					'blog_id'    => '8',
					'tag_id'     => '1',
					"created_at" => "2020-09-19 01:10:44",
					"updated_at" => "2021-04-19 21:30:14",
				],
				[
					'blog_id'    => '9',
					'tag_id'     => '6',
					"created_at" => "2021-04-13 07:51:50",
					"updated_at" => "2021-07-03 17:11:16",
				],
		]);
	}
}
