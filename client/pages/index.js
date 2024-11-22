import apiGetContactInfo from "@/api/contact-info";
import apiGetProductCategories from "@/api/product-categories";
import apiGetProducts from "@/api/products";
import MobileContactFixedBtn from "@/components/sections/MobileContactFixedBtn";
import ProductListSection from "@/components/sections/product-list";
import Head from "next/head";
import { unstable_serialize as infinite_unstable_serialize } from "swr/infinite";

export async function getServerSideProps({ req }) {
  return {
    props: {
      fallback: {
        "/product-categories": await apiGetProductCategories(),

        [infinite_unstable_serialize(
          (pageIndex) =>
            `/products?page=${pageIndex + 1}&product_category_slug=`
        )]: [await apiGetProducts()],

        "/contact-info": await apiGetContactInfo(),
      },
    },
  };
}

function HomePage() {
  return (
    <>
      <Head>
        <title>Home - Nadrat Shouq Est</title>
      </Head>
      <ProductListSection />
      <MobileContactFixedBtn />
    </>
  );
}

export default HomePage;
