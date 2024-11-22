import React, { useEffect, useState } from "react";
import ProductItem, { ProductItemLoadingPlaceholder } from "./ProductItem";
import { InView, useInView } from "react-intersection-observer";
import useSWRInfinite from "swr/infinite";

const Listing = ({ selectedCategorySlug }) => {
  const { data, isLoading, size, setSize } = useSWRInfinite(
    (pageIndex, previousPageData) => {
      if (previousPageData && !previousPageData.next_page_url) return null;
      pageIndex++;
      return `/products?page=${pageIndex}&product_category_slug=${selectedCategorySlug}`;
    },
    {
      revalidateFirstPage: false,
      revalidateFirstPage: false,
      revalidateOnMount: false,
      revalidateOnFocus: false,
    }
  );

  const products = data.flatMap((item) => item.data);
  const isReachesEnd = !data[data.length - 1].next_page_url;
  const isLoadMoreLoading = data && typeof data[size - 1] == "undefined";
  const isProductLoading = isLoading && !isLoadMoreLoading;

  const {
    ref: inViewPortRef,
    inView,
    entry,
  } = useInView({
    /* Optional options */
    threshold: 0,
  });

  useEffect(() => {
    if (inView && !isReachesEnd && !isLoadMoreLoading && !isProductLoading) {
      setSize((size) => size + 1);
    }
  }, [inView]);

  return (
    <>
      <div
        className="cs-container grid grid-cols-1 gap-9 py-4
      sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 aria-hidden:hidden"
      >
        {isProductLoading ? (
          <ProductItemsLoadingPlaceholders />
        ) : (
          <>
            {products.map((product) => (
              <ProductItem key={product.id} product={product} />
            ))}
          </>
        )}
        {isLoadMoreLoading && <ProductItemsLoadingPlaceholders />}
      </div>
      <div ref={inViewPortRef}></div>
    </>
  );
};

export default Listing;

const ProductItemsLoadingPlaceholders = () => {
  return [1, 2, 3, 4, 5, 6].map((key) => (
    <ProductItemLoadingPlaceholder key={key} />
  ));
};
