import React, { useEffect, useState } from "react";
import CategoryList from "./CategoryList";
import Listing from "./Listing";

const ProductListSection = () => {
  const [selectedCategorySlug, setSelectedCategorySlug] = useState("");

  return (
    <section>
      <CategoryList {...{ selectedCategorySlug, setSelectedCategorySlug }} />
      <Listing {...{ selectedCategorySlug }} />
    </section>
  );
};

export default ProductListSection;
