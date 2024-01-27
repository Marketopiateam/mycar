 import 'package:flutter/material.dart';
// import 'package:flutter_screenutil/flutter_screenutil.dart';
// import 'package:mycar/common/custom_appbar.dart';
// import 'package:mycar/common/custom_container.dart';
// import 'package:mycar/common/heading.dart';
// import 'package:mycar/constants/constants.dart';
// import 'package:mycar/views/home/all_fastest_foods_page.dart';
// import 'package:mycar/views/home/all_nearby_restaurants.dart';
// import 'package:mycar/views/home/recommendations_page.dart';
// import 'package:mycar/views/home/widgets/category_list.dart';
// import 'package:mycar/views/home/widgets/food_list.dart';
// // import 'package:mycar/views/home/widgets/nearby_restaurants_list.dart';
// import 'package:get/get.dart';


//   @override
//   Widget build(BuildContext context) {
//     return Scaffold(
//        backgroundColor: kPrimary,
//        appBar: PreferredSize(
        
//            preferredSize: Size.fromHeight(130.h), child: const CustomAppBar()),
//       body: SafeArea(
//         child: CustomContainer(
//             containerContent: Column(
//           children: [
//             const CategoryList(),
//             Heading(
//               text: "Nearby Restaurants",
//               onTap: () {
//                 Get.to(() => const AllNearbyRestaurants(),
//                     transition: Transition.cupertino,
//                     duration: const Duration(milliseconds: 900));
//               },
//             ),
//             // const NearbyRestaurants(),
//             // Heading(
//             //   text: "Try Something New",
//             //   onTap: () {
//             //     Get.to(() => const RecommendationsPage(),
//             //         transition: Transition.cupertino,
//             //         duration: const Duration(milliseconds: 900));
//             //   },
//             // ),
//             const FoodsList(),
//             Heading(
//               text: "Food closer to you",
//               onTap: () {
//                 Get.to(() => const AllFastestFoods(),
//                     transition: Transition.cupertino,
//                     duration: const Duration(milliseconds: 900));
//               },
//             ),
//             const FoodsList(),
//           ],
//         )),
//       ),
//     );
//   }
// }

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Home'),
      ),
      body: const Center(
        child: Text('Home Page'),
      ),
    );
  }
}
